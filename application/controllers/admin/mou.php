<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mou extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/Mou_model");
    }

    public function index(){
        $data["getAll"] = $this->Mou_model->getAll();
        $this->load->view('panel/mou', $data);
    }

    public function add()
    {
        $model = $this->Mou_model;
        $validation = $this->form_validation;

        if($validation){
            $model->save();
            $this->session->set_flashdata('simpan', 'Berhasil');
        }else{
            $this->session->set_flashdata('gglsimpan', 'Gagal');
        }

        redirect('admin/mou');
    }

    public function update()
    {
        $model = $this->Mou_model;
        $validation = $this->form_validation;

        if($validation){
            $model->update();
            $this->session->set_flashdata('ubah', 'Berhasil');
        }else{
            $this->session->set_flashdata('gglubah', 'Gagal');
        }

        redirect('admin/mou');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

		if ($this->Mou_model->delete($id)) {
			redirect('admin/mou');
		}
    }

}