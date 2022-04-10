<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class overview extends CI_Controller
{
    public function _construct()
    {
        parent::__construct();
        $this->ceksession->user();
        $this->load->model("admin/panel_models");
    }

    public function index()
    {
        $a = $this->panel_models->jumlah_moa();
        var_dump($a);
        $this->load->view('overview');
    }
}