<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->ceksession->user();
        $this->load->model("admin/Panel_models");
    }


    public function index()
    {
        $data["htg"] = $this->Panel_models->notif();
        $data["notif"] = $this->Panel_models->isi_notif();
        $data["moa"] = $this->Panel_models->jumlah_moa();
        $data["riks"] = $this->Panel_models->jumlah_riks();
        $data["ar"] = $this->Panel_models->jumlah_ar();
        $this->load->view('panel/home', $data);
    }
}