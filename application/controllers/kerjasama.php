<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kerjasama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("kerjasama_model");
    }

    public function index()
    {
        // $data["getmoa"] = $this->kerjasama_model->moa();
        // $data["getrks"] = $this->kerjasama_model->riks();
        // $data["getar"] = $this->kerjasama_model->ar();

        $data["get"] = $this->kerjasama_model->tree();
        $this->load->view('kerjasama', $data);
    }

    public function tree()
    {
        $data["get"] = $this->kerjasama_model->tree();

        // echo '<pre>';
        // var_dump($data["get"]);
        // echo '</pre>';
        // die();
        $this->load->view('tree', $data);
    }

    // public function treeview()
    // {
    //     $this->kerjasama_model->treeview();
    //     // $this->kerjasama_model->yaa();
    // }
    
    public function modal()
    {
        $this->kerjasama_model->treeview();
    }
    
    public function modal_ar()
    {
        $this->kerjasama_model->modal_ar();
    }
}