<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/ajuan_model");
    }

    public function index()
    {
        $data["getAll"] = $this->ajuan_model->getAll();
        $this->load->view('panel/ajuan/index', $data);
    }

    public function ajukan()
    {
        $data["unit"] = $this->ajuan_model->getUnit();
        $data["mou"] = $this->ajuan_model->getMou();

        $this->load->view('panel/ajuan/ajuan', $data);
    }

    public function add()
    {
        $model = $this->ajuan_model;
        $validation = $this->form_validation;

        if($validation)
        {
            $model->save();
            $this->session->set_flashdata('simpan', 'success');
        }else{
            $this->session->set_flashdata('gglsimpan', 'error');
        }
        redirect('admin/ajuan');
    }

    public function edit()
    {
        $model = $this->ajuan_model;
        $validation = $this->form_validation;

        if($validation)
        {
            $model->update();
            $this->session->set_flashdata('ubah', 'success');
        }else{
            $this->session->set_flashdata('gglubah', 'error');
        }
        redirect('admin/ajuan');
    }

    public function delete($id)
    {
        if(!isset($id)) show_404();

        $this->ajuan_model->delete($id);
        $this->ajuan_model->deleted($id);
        redirect('admin/ajuan');
    }

}