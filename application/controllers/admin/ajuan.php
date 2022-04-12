<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/ajuan_model");
    }

    public function index()
    {
        $data["getAll"] = $this->ajuan_model->getAll();
        $this->load->view('panel/ajuan/index', $data);
    }

    public function ajukan()
    {
        $data["unit"] = $this->ajuan_model->getUnit();
        $data["mou"] = $this->ajuan_model->getMou();
        $data["id"] = $this->ajuan_model->getAI();

        $this->load->view('panel/ajuan/ajuan', $data);
    }

    public function editable($id)
    {
        $data["getData"] = $this->ajuan_model->getID($id);
        $data["unit"] = $this->ajuan_model->getUnit();
        $data["mou"] = $this->ajuan_model->getMou();
        
        $this->load->view('panel/ajuan/edit', $data);
    }

    public function add()
    {
        $model = $this->ajuan_model;
        $validation = $this->form_validation;

        if($validation)
        {
            $model->save();
            $model->saveHistory();
            $this->session->set_flashdata('simpan', 'success');
        }else{
            $this->session->set_flashdata('gglsimpan', 'error');
        }
        redirect('admin/ajuan');
    }

    public function edit()
    {
        $model = $this->ajuan_model;
        $validation = $this->form_validation;

        if($validation)
        {
            $model->update();
            $this->session->set_flashdata('ubah', 'success');
        }else{
            $this->session->set_flashdata('gglubah', 'error');
        }
        redirect('admin/ajuan');
    }

    public function delete($id)
    {
        if(!isset($id)) show_404();

        $this->ajuan_model->delete($id);
        $this->ajuan_model->deleted($id);
        redirect('admin/ajuan');
    }

    public function status_dua($id)
    {
        $model = $this->ajuan_model;
        $validation = $this->form_validation;;
        if($validation){
            $model->dua($id);
            $this->session->set_flashdata('dua', 'success');
        }else{
            $this->session->set_flashdata('ggldua', 'error');
        }
        redirect('admin/ajuan');
    }

    public function status_tiga($id)
    {
        $model = $this->ajuan_model;
        $validation = $this->form_validation;
        if ($validation) {
            $model->tiga($id);
            $this->session->set_flashdata('tiga', 'success');
        } else {
            $this->session->set_flashdata('ggltiga', 'error');
        }
        redirect('admin/ajuan');
    }

    public function status_empat($id)
    {
        $model = $this->ajuan_model;
        $validation = $this->form_validation;
        if ($validation) {
            $model->empat($id);
            $this->session->set_flashdata('empat', 'success');
        } else {
            $this->session->set_flashdata('gglempat', 'error');
        }
        redirect('admin/ajuan');
    }

    public function status_lima($id)
    {
        $model = $this->ajuan_model;
        $validation = $this->form_validation;
        if ($validation) {
            $model->lima($id);
            $this->session->set_flashdata('lima', 'success');
        } else {
            $this->session->set_flashdata('ggllima', 'error');
        }
        redirect('admin/ajuan');
    }

    public function moa()
    {
        $data["getmoa"] = $this->ajuan_model->get_moa();
        $this->load->view('panel/ajuan/moa',$data);
    }

    public function riks()
    {
        $data["getriks"] = $this->ajuan_model->get_riks();
        $this->load->view('panel/ajuan/riks',$data);
    }

    public function ar()
    {
        $data["getar"] = $this->ajuan_model->get_ar();
        $this->load->view('panel/ajuan/ar',$data);
    }

}