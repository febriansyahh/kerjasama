<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tingkatan extends CI_Controller{
    public function __construct(){
        parent::__construct();
		$this->load->library('form_validation');
        $this->load->model("admin/tingkatan_model");
    }

    public function index()
    {
        $data['tingkatan'] = $this->tingkatan_model->getAll();
        $this->load->view("panel/tingkatan", $data);
        // $this->load->view("panel/tingkatan");
    }

    public function add()
    {
        $model = $this->tingkatan_model;
		$validation = $this->form_validation;

        if($validation){
            $model->save();
            $this->session->set_flashdata('simpan', 'Berhasil Simpan');
        }else{
            $this->session->set_flashdata('gglSimpan', 'Gagal Simpan');
        }

        redirect('admin/tingkatan');
    }
}