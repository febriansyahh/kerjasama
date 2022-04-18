<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
        $this->load->model("admin/Unit_model");
    }

    public function index()
    {
        $data['unit'] = $this->Unit_model->getAll();
        $data['parent'] = $this->Unit_model->getUnit();
        $data['tingkatan'] = $this->Unit_model->getData();
        $this->load->view('panel/unit', $data);
    }

    public function add()
    {
        $model = $this->Unit_model;
        $validation = $this->form_validation;

        if($validation){
            $model->save();
            $this->session->set_flashdata('simpan', 'Berhasil Disimpan');
        }else{
            $this->session->set_flashdata('gglSimpan', 'Gagal Disimpan');
        }
        redirect('admin/unit');
    }

    public function edit()
    {
        $model = $this->Unit_model;
        $validation = $this->form_validation;

        if($validation)
        {
            $model->update();
            $this->session->set_flashdata('ubah', 'Berhasil ubah');
        }else{
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }
        redirect('admin/unit');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

		if ($this->Unit_model->delete($id)) {
			redirect('admin/unit');
		}
    }
}