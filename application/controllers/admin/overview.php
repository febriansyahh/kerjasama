<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class overview extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->ceksession->user();
        $this->load->model("admin/panel_models");
    }


    public function index()
    {
        $data["htg"] = $this->panel_models->notif();
        $data["notif"] = $this->panel_models->isi_notif();
        $data["moa"] = $this->panel_models->jumlah_moa();
        $data["riks"] = $this->panel_models->jumlah_riks();
        $data["ar"] = $this->panel_models->jumlah_ar();
        $this->load->view('panel/home', $data);
    }
}