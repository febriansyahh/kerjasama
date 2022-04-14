<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class kerjasama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/kerjasama_model");
        $this->load->model("admin/panel_models");
    }

    public function index()
    {
        $data["htg"] = $this->panel_models->notif();
        $data["notif"] = $this->panel_models->isi_notif();
        $data["getAll"] = $this->kerjasama_model->getAll();
        $this->load->view('panel/kerjasama/index', $data);
    }

    public function result()
    {
        $data["htg"] = $this->panel_models->notif();
        $data["notif"] = $this->panel_models->isi_notif();
        $data["getAll"] = $this->kerjasama_model->result();
        $this->load->view('panel/kerjasama/result', $data);
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
        $data["getById"] = $this->kerjasama_model->getbyid($id);
        $data["getrks"] = $this->kerjasama_model->rks($id);
        $data["getar"] = $this->kerjasama_model->ar($id);

        $data["htg"] = $this->panel_models->notif();
        $data["notif"] = $this->panel_models->isi_notif();
        
        $this->load->view('panel/kerjasama/detail', $data);
    }
    
    public function v_detail($id)
    {
        $data["getById"] = $this->kerjasama_model->getbyid($id);
        $data["getrks"] = $this->kerjasama_model->rks($id);
        $data["getar"] = $this->kerjasama_model->ar($id);
        
        $data["htg"] = $this->panel_models->notif();
        $data["notif"] = $this->panel_models->isi_notif();
        
        $this->load->view('panel/kerjasama/v_detail', $data);
    }

    public function moa()
    {
        $data["ajuan"] = $this->kerjasama_model->getAjuanPIC();
        $data["unit"] = $this->kerjasama_model->getUnitId();

        $data["htg"] = $this->panel_models->notif();
        $data["notif"] = $this->panel_models->isi_notif();

        $this->load->view('panel/kerjasama/moa', $data);
    }
    
    public function add_moa()
    {
        $model = $this->kerjasama_model;
        $validation = $this->form_validation;

        if($validation){
            $model->save_moa();
            $this->session->set_flashdata('simpan', 'Berhasil');
        }else{
            $this->session->set_flashdata('gglsimpan', 'Gagal');
        }
        
        redirect('admin/kerjasama/');
    }
    
    public function upload()
    {
        $data["ajuan"] = $this->kerjasama_model->getAjuanPIC();
        $data["unit"] = $this->kerjasama_model->getUnitId();

        $data["htg"] = $this->panel_models->notif();
        $data["notif"] = $this->panel_models->isi_notif();
        
        $this->load->view('panel/kerjasama/upload', $data);
    }

    // public function usulan()
    // {
    //     // $data["usulan"] = $this->ajuan_model->getUsulan();
    //     // $this->load->view('panel/kerjasama/usulan', $data);
    //     $this->load->view('panel/kerjasama/usulan');
    // }

    public function changeKerjasama()
    {
        $this->kerjasama_model->changeKerjasama();
    }
    
    public function changeMoa()
    {
        $this->kerjasama_model->changeMoa();
    }

    public function changeRiks()
    {
        $this->kerjasama_model->changeRiks();
    }

    public function add_riks()
    {
        $model = $this->kerjasama_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save_kerja();
            $this->session->set_flashdata('simpan', 'Berhasil');
        } else {
            $this->session->set_flashdata('gglsimpan', 'Gagal');
        }

        redirect('admin/kerjasama/');
    }
}