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
        $data["getmoa"] = $this->kerjasama_model->moa();
        $data["getrks"] = $this->kerjasama_model->riks();
        $data["getar"] = $this->kerjasama_model->ar();
        $this->load->view('kerjasama', $data);
    }
}