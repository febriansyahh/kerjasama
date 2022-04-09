<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class overview extends CI_Controller
{
    public function _construct()
    {
        parent::__construct();
        $this->ceksession->user();
        // $this->load->library('form_validation');
        $this->load->model("admin/Dashboard_model");
    }

    public function index()
    {
        $data["moa"] = $this->Dashboard_model->moa();
        // $data["riks"] = $this->Dashboard_model->riks();
        // $data["ar"] = $this->Dashboard_model->ar();
        $this->load->view('overview', $data);
    }
}