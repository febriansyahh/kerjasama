<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/User_model");
    }

    public function index()
    {
        $data["user"] = $this->User_model->getAll();
        $data["unit"] = $this->User_model->getData();

        $this->load->view('panel/user', $data);
    }

    public function add()
    {
        $model = $this->User_model;
        $validation = $this->form_validation;

        // $validation->set_rules($model->rules());
        
		// if ($validation->run())
        // {
        //     $model->save();
        //     die();
        //     $this->session->set_flashdata('simpan', 'Berhasil Simpan');
        // }else{
        //     $this->session->set_flashdata('simpan', 'Berhasil Simpan');
        // }

        if($validation)
        {
            $model->save();
            $this->session->set_flashdata('simpan', 'Berhasil Simpan');
        }else{
            $this->session->set_flashdata('simpan', 'Berhasil Simpan');
        }

        redirect('admin/User');
    }

    public function edit()
    {
        $validation = $this->form_validation;
        $post = $this->input->post();

        if($validation)
        {
            $this->User_model->update();
            
            $this->session->set_flashdata('ubah', 'Berhasil ubah');
        }else{
            $this->session->set_flashdata('gglubah', 'Berhasil ubah');
        }

        redirect('admin/User');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

		if ($this->User_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/User');
		}
    }
}