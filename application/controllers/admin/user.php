<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/user_model");
    }

    public function index()
    {
        $data["user"] = $this->user_model->getAll();
        $data["unit"] = $this->user_model->getData();

        $this->load->view('panel/user', $data);
    }

    public function add()
    {
        $model = $this->user_model;
        $validation = $this->form_validation;

        $validation->set_rules($model->rules());
        
        // if($validation)
		if ($validation->run())
        {
            $model->save();
            $this->session->set_flashdata('simpan', 'Berhasil Simpan');
        }else{
            $this->session->set_flashdata('simpan', 'Berhasil Simpan');
        }

        redirect('admin/user');
    }

    public function edit()
    {
        $model = $this->user_model;
        $validation = $this->form_validation;

        if($validation)
        {
            $model->update();
            $this->session->set_flashdata('ubah', 'Berhasil ubah');
        }else{
            $this->session->set_flashdata('gglubah', 'Berhasil ubah');
        }

        redirect('admin/user');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

		if ($this->user_model->delete($id)) {
			redirect('admin/user');
		}
    }
}