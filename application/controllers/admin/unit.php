<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
        $this->load->model("admin/unit_model");
    }

    public function index()
    {
        $data['unit'] = $this->unit_model->getAll();
        $data['parent'] = $this->unit_model->getUnit();
        $data['tingkatan'] = $this->unit_model->getData();
        $this->load->view('panel/unit', $data);
    }

    public function add()
    {
        $model = $this->unit_model;
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
        $model = $this->unit_model;
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

		if ($this->unit_model->delete($id)) {
			redirect('admin/unit');
		}
    }
}