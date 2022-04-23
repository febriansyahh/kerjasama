<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjasama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("Kerjasama_model");
    }

    public function index()
    {
        $data["parent"] = $this->Kerjasama_model->getParentAjuan();

        $this->load->view('kerjasama', $data);
    }

    public function tree()
    {
        $data["parent"] = $this->Kerjasama_model->getParentAjuan();
        // $data["child"] = $this->Kerjasama_model->getChild();

        $this->load->view('tree', $data);
    }

    public function changemoa()
    {
        $this->Kerjasama_model->changemoa();
    }
    
    public function modal()
    {
        $this->Kerjasama_model->treeview();
    }
    
    public function modal_ar()
    {
        $this->Kerjasama_model->modal_ar();
    }
}