<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class kerjasama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/kerjasama_model");
    }

    public function index()
    {
        $data["getAll"] = $this->kerjasama_model->getAll();
        $this->load->view('panel/kerjasama/index', $data);
    }

    public function add()
    {
        $model = $this->kerjasama_model;
        $validation = $this->form_validation;

        if($validation)
        {
            $model->save();
            $this->session->set_flashdata('simpan', 'Berhasil');
        }else{
            $this->session->set_flashdata('gglsimpan', 'Gagal');
        }
        
        redirect('admin/kerjasama');
    }

    public function edit()
    {
        $model = $this->kerjasama_model;
        $validation = $this->form_validation;

        if($validation)
        {
            $model->update();
            $this->session->set_flashdata('ubah', 'Berhasil');
        }else{
            $this->session->set_flashdata('gglubah', 'Gagal');
        }
        
        redirect('admin/kerjasama');
    }

    public function delete($id)
    {
        if(!isset($id)) show_404();

        if ($this->ajuan_model->delete($id)) {
            redirect('admin/kerjasama');
        }
    }

    public function detail($id)
    {
        $data["getById"] = $this->ajuan_model->getbyid($id);
        $this->load->view('panel/kerjasama/detail', $data);
    }

    public function moa()
    {
        $data["ajuan"] = $this->kerjasama_model->getAjuanPIC();
        $data["unit"] = $this->kerjasama_model->getUnitId();
        $this->load->view('panel/kerjasama/moa', $data);
    }

    // public function usulan()
    // {
    //     // $data["usulan"] = $this->ajuan_model->getUsulan();
    //     // $this->load->view('panel/kerjasama/usulan', $data);
    //     $this->load->view('panel/kerjasama/usulan');
    // }
}