<?php
/*
 * This file contains the Model.
 * 
 * @php version 5.6
 * @author Jahid Mahmud
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // load the model
        $this->load->model('products_model');
        $this->load->library('file_processing');
    }

    public function index() {
        $data = array();
        $data['pageTitle'] = "Manage products";
        //get all user data
        $data['all_data'] = $this->products_model->getAll();

        $this->load->view('products/manage', $data);
    }

    public function create() {
        $data = array();
        $data['pageTitle'] = "products Form";


        if ($this->input->post('submit')) {

                $addData = array();

                $addData['name'] = $this->input->post('name');
                $addData['descrition'] = $this->input->post('descrition');
                $addData['price'] = md5($this->input->post('price'));

                if ($this->products_model->create($addData)) {
                    $this->session->set_flashdata('success_msg', 'Add Successfully!!');
                    log_message('info', 'products_ADDED name= ' .$addData['name'].' price='.$addData['price']);

                    redirect('products');
                } else
                    $data['error'] = mysql_error();
        }

        $this->load->view('products/create', $data);
    }

    //Edit user
    public function edit($id) {
        $data = array();
        $data['pageTitle'] = "Ürün Düzenle";

        $data['getData'] = $getData = $this->products_model->get_single_data($id);

        if ($this->input->post('submit')) {

                $addData = array();

                $addData['name'] = $this->input->post('name');
                $addData['descrition'] = $this->input->post('descrition');
                $addData['price'] = $this->input->post('price');

                if ($this->products_model->update($addData, $id)) {
                    $this->session->set_flashdata('success_msg', 'Update Successfully!!');
                    log_message('info', 'products_UpDATED name= ' .$addData['name'].'  price='.$addData['price']);
                    redirect('products');
                } else
                    $data['error'] = mysql_error();
        }
        $this->load->view('products/edit', $data);
    }

    public function delete($id) {
        $getData = $this->products_model->get_single_data($id);

        if ($this->products_model->delete($id)) {
            $this->session->set_flashdata('success_msg', 'Successfully Deleted!!');
            log_message('info', 'products_DELETED ID= ' .$id.' products deleted');
            redirect('products');
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
