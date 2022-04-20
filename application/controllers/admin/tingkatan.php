<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkatan extends CI_Controller{
    public function __construct(){
        parent::__construct();
		$this->load->library('form_validation');
        $this->load->model("admin/Tingkatan_model");
    }

    public function index()
    {
        $data['tingkatan'] = $this->Tingkatan_model->getAll();
        $this->load->view("panel/tingkatan", $data);
        // $this->load->view("panel/tingkatan");
    }

    public function add()
    {
        $model = $this->Tingkatan_model;
		$validation = $this->form_validation;

        if($validation){
            $model->save();
            $this->session->set_flashdata('simpan', 'Berhasil Simpan');
        }else{
            $this->session->set_flashdata('gglSimpan', 'Gagal Simpan');
        }

        redirect('admin/tingkatan');
    }

    public function update()
    {
        $model = $this->Tingkatan_model;
        $validation = $this->form_validation;

        if($validation)
        {
            $model->update();
            $this->session->set_flashdata('ubah', 'Berhasil ubah');
        }else{
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }
            redirect('admin/tingkatan');

    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

		if ($this->Tingkatan_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/tingkatan');

		}
    }
}