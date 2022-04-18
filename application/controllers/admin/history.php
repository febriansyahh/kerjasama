<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/History_model");
    }

    public function index()
    {
        $data["all"] = $this->History_model->all();
        $this->load->view('panel/history/index', $data);
    }

    public function detail($id)
    {
        $data["detail"] = $this->History_model->detail($id);
        $this->load->view('panel/history/detail', $data);
    }
}