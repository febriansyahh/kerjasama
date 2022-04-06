<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class status_ajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/status_model");
    }

    public function index()
    {
        $data["getAll"] = $this->status_model->getAll();
        $this->load->view('panel/status', $data);
    }

    public function add()
    {
        $model = $this->status_model;
        $validation = $this->form_validation;

        if($validation){
            $model->save();
            $this->session->set_flashdata('simpan', 'Berhasil');
        }else{
            $this->session->set_flashdata('gglsimpan', 'Gagal');
        }

        redirect('admin/status_ajuan');
    }

    public function update()
    {
        $model = $this->status_model;
        $validation = $this->form_validation;

        if($validation){
            $model->update();
            $this->session->set_flashdata('ubah', 'Berhasil');
        }else{
            $this->session->set_flashdata('gglubah', 'Gagal');
        }

        redirect('admin/status_ajuan');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

		if ($this->status_model->delete($id)) {
			redirect('admin/status_ajuan');
		}
    }
}