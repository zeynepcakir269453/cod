<?php
/*
 * This file contains the Model.
 * 
 * @php version 5.6
 * @author Jahid Mahmud
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // load the model
        $this->load->model('user_model');
        $this->load->library('file_processing');
    }

    public function index() {
        $data = array();
        $data['pageTitle'] = "Manage User";
        //get all user data
        $data['all_data'] = $this->user_model->getAll();

        $this->load->view('user/manage', $data);
    }

    public function indexlogin() {
        $data = array();
        // $data['pageTitle'] = "Manage User";
        //get all user data
        //$data['all_data'] = $this->user_model->getAll();
        if ($this->session->userdata()) {
            $name=$this->input->post('name');
            $pass=md5($this->input->post('password'));
            // $data['name'] =$name;

            $data['getData'] = $getData = $this->user_model->get_single_data_login($name);

            if($data)
            {
                $this->session->set_userdata($data['getData']);
                $this->load->view('products/manage', $data);
            }
            else
            {
                $this->load->view('user/login', $data);
            }
        }else
         $this->load->view('user/login', $data);
    }

    public function login()
    {
        $data = array();
        if($this->input->post('name'))
        {
            $name=$this->input->post('name');
            $pass=$this->input->post('password');

            $data['getData'] = $getData = $this->user_model->get_single_data_login($name);

            if($data)
            {
                $this->session->set_userdata($data);
                $this->load->view('user/view', $data);
            }
            else
            {
                $this->load->view('user/view', $data);
            }
        }
        $this->load->view('user/view', $data);
    }

    public function create() {
        $data = array();
        $data['pageTitle'] = " User Form";


        if ($this->input->post('submit')) {

                $addData = array();

                $addData['name'] = $this->input->post('name');
                $addData['balance'] = $this->input->post('balance');
                $addData['authority'] = $this->input->post('authority');
                $addData['password'] = md5($this->input->post('password'));
                $addData['added'] = date('Y-m-d H:i:s');

                if ($this->user_model->create($addData)) {
                    $this->session->set_flashdata('success_msg', 'Add Successfully!!');
                    log_message('info', 'USER_ADDED name= ' .$addData['name'].' balance='.$addData['balance']);

                    redirect('user');
                } else
                    $data['error'] = mysql_error();
        }

        $this->load->view('user/create', $data);
    }

    //Edit user
    public function edit($id) {
        $data = array();
        $data['pageTitle'] = "Kullanıcı Düzenle";

        $data['getData'] = $getData = $this->user_model->get_single_data($id);

        if ($this->input->post('submit')) {

                $addData = array();

                $addData['name'] = $this->input->post('name');
                $addData['balance'] = $this->input->post('balance');

                if ($this->user_model->update($addData, $id)) {
                    $this->session->set_flashdata('success_msg', 'Update Successfully!!');
                    log_message('info', 'USER_UpDATED name= ' .$addData['name'].'  balance='.$addData['balance']);
                    redirect('user');
                } else
                    $data['error'] = mysql_error();
        }
        $this->load->view('user/edit', $data);
    }

    public function view($id) {
        $data = array();
        $data['pageTitle'] = "View User Information";

        //get a user data
        $data['getData'] = $getData = $this->user_model->get_single_data($id);

        $this->load->view('user/view', $data);
    }

    public function delete($id) {
        $getData = $this->user_model->get_single_data($id);

        if ($this->user_model->delete($id)) {
            $this->session->set_flashdata('success_msg', 'Successfully Deleted!!');
            log_message('info', 'USER_DELETED ID= ' .$id.' user deleted');
            redirect('user');
        }
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
