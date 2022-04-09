<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/history_model");
    }

    public function index()
    {
        $data["all"] = $this->history_model->all();
        $this->load->view('panel/history/index', $data);
    }

    public function detail($id)
    {
        $data["detail"] = $this->history_model->detail($id);
        $this->load->view('panel/history/detail', $data);
    }
}