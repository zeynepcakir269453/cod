<?php
/*
 * This file contains the Model.
 * 
 * @php version 5.6
 * @author Jahid Mahmud
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Balance extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // load the model
        $this->load->model('balance_model');
        $this->load->model('user_model');
        $this->load->library('file_processing');
    }

    public function index() {
        $data = array();
        $data['pageTitle'] = "Manage Balance";
        //get all user data
        $data['all_data'] = $this->balance_model->getAll();

        $this->load->view('balance/manage', $data);
    }

    public function create() {
        $data = array();
        $data['pageTitle'] = "products Form";
        $this->load->view('products/create', $data);
    }

    public function edit() {

        $data = array();
        $data['pageTitle'] = "Manage balance";

        if ($this->input->post()) {
            $addData = array();
            $id= $this->session->userdata('user_id');

            $old_balance= $this->session->userdata('balance');
            $new_balance= $this->input->post('new_balance');
            $addData['balance']=$old_balance+$new_balance;
            $sumbalance=$old_balance+$new_balance;
            if ($this->user_model->update($addData, $id)) {
                $addData = array();
                $addData['user']=$this->session->userdata('name');
                $addData['pre_balance']=$old_balance;
                $addData['new_balance']=$sumbalance;
                $addData['action']='added balance';
                if ($this->balance_model->create($addData)) {
                    $this->session->set_flashdata('success_msg', 'Add Successfully!!');
                    $this->session->set_userdata('balance',$sumbalance);
                    log_message('info', 'balance_updated user_name= ' .$addData['user'].' balance='.$sumbalance);

                    redirect('products');
                } else
                    $data['error'] = mysql_error();
            }
        }else{
        $this->load->view('balance/edit', $data);
        }
    }

    public function delete($id) {

    }

    // file validation
    public function file_validate($fieldValue, $params) {
        // get the parameter as variable
        list($require, $fieldName, $type) = explode('.', $params);

        // get the type as array
        $types = explode(',', $type);

        // get the file field name
        $filename = $_FILES[$fieldName]['name'];

        if (is_array($filename)) {
            // filter the array
            $filename = array_filter($filename);

            if (count($filename) == 0 && $require == 'yes') {
                $this->form_validation->set_message('file_validate', 'The %s field is required');
                return FALSE;
            } elseif ($type != '' && count($filename) != 0) {
                foreach ($filename as $aFile) {
                    // get the extention
                    $ext = strtolower(substr(strrchr($aFile, '.'), 1));

                    if (!in_array($ext, $types)) {
                        $this->form_validation->set_message('file_validate', 'The %s field must be ' . implode(' OR ', $types) . ' !!');
                        return FALSE;
                    }
                }
                return true;
            } else {
                return TRUE;
            }
        } else {
            if ($filename == '' && $require == 'yes') {
                $this->form_validation->set_message('file_validate', 'The %s field is required');
                return FALSE;
            } elseif ($type != '' && $filename != '') {
                // get the extention
                $ext = strtolower(substr(strrchr($filename, '.'), 1));

                if (!in_array($ext, $types)) {
                    $this->form_validation->set_message('file_validate', 'The %s field must be ' . implode(' OR ', $types) . ' !!');
                    return FALSE;
                }
            } else
                return TRUE;
        }
    }

}
