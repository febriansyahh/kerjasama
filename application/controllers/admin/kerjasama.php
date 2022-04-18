<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjasama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/Kerjasama_model");
        $this->load->model("admin/Panel_models");
    }

    public function index()
    {
        $data["htg"] = $this->Panel_models->notif();
        $data["notif"] = $this->Panel_models->isi_notif();
        $data["getAll"] = $this->Kerjasama_model->getAll();
        $this->load->view('panel/kerjasama/index', $data);
    }

    public function result()
    {
        $data["htg"] = $this->Panel_models->notif();
        $data["notif"] = $this->Panel_models->isi_notif();
        $data["getAll"] = $this->Kerjasama_model->result();
        $this->load->view('panel/kerjasama/result', $data);
    }

    public function add()
    {
        $model = $this->Kerjasama_model;
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

    public function edit($id)
    {
        $data["getData"] = $this->Kerjasama_model->getID($id);
        $data["mou"] = $this->Kerjasama_model->getMou();
        $data["unit"] = $this->Kerjasama_model->getUnit();

        $data["htg"] = $this->Panel_models->notif();
        $data["notif"] = $this->Panel_models->isi_notif();

        $this->load->view('panel/kerjasama/edit', $data);
    }

    public function update()
    {
        $model = $this->Kerjasama_model;
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
        $data["getById"] = $this->Kerjasama_model->getbyid($id);
        $data["getrks"] = $this->Kerjasama_model->rks($id);
        $data["getar"] = $this->Kerjasama_model->ar($id);

        $data["htg"] = $this->Panel_models->notif();
        $data["notif"] = $this->Panel_models->isi_notif();
        
        $this->load->view('panel/kerjasama/detail', $data);
    }
    
    public function v_detail($id)
    {
        $data["getBy"] = $this->Kerjasama_model->getbyid($id);
        
        $data["getrks"] = $this->Kerjasama_model->rks($id);
        // $data["getById"] = $this->Kerjasama_model->getbyid($id);
        // $data["getar"] = $this->Kerjasama_model->ar($id);
        
        $data["htg"] = $this->Panel_models->notif();
        $data["notif"] = $this->Panel_models->isi_notif();

        // echo '<pre>';
        // var_dump($data["getrks"]);
        // var_dump($data["getar"]);
        // echo '</pre>';
        // die();
        
        $this->load->view('panel/kerjasama/v_detail', $data);
    }

    public function moa()
    {
        $data["ajuan"] = $this->Kerjasama_model->getAjuanPIC();
        $data["unit"] = $this->Kerjasama_model->getUnitId();

        $data["htg"] = $this->Panel_models->notif();
        $data["notif"] = $this->Panel_models->isi_notif();

        $this->load->view('panel/kerjasama/moa', $data);
    }
    
    public function add_moa()
    {
        $model = $this->Kerjasama_model;
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
        $data["ajuan"] = $this->Kerjasama_model->getAjuanPIC();
        $data["unit"] = $this->Kerjasama_model->getUnitId();

        $data["htg"] = $this->Panel_models->notif();
        $data["notif"] = $this->Panel_models->isi_notif();
        
        $this->load->view('panel/kerjasama/upload', $data);
    }

    public function changeKerjasama()
    {
        $this->Kerjasama_model->changeKerjasama();
    }
    
    public function changeMoa()
    {
        $this->Kerjasama_model->changeMoa();
    }

    public function changeRiks()
    {
        $this->Kerjasama_model->changeRiks();
    }

    public function add_riks()
    {
        $model = $this->Kerjasama_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save_kerja();
            $this->session->set_flashdata('simpan', 'Berhasil');
        } else {
            $this->session->set_flashdata('gglsimpan', 'Gagal');
        }

        redirect('admin/kerjasama/');
    }

    public function modal()
    {
        $this->Kerjasama_model->modal();
    }

    public function modal_ar()
    {
        $this->Kerjasama_model->modal_ar();
    }
}