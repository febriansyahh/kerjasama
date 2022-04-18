<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
        $this->load->model("Kerjasama_model");
	}

	public function index()
	{
		$data["moa"] = $this->Kerjasama_model->jumlah_moa();
		$data["riks"] = $this->Kerjasama_model->jumlah_riks();
		$data["ar"] = $this->Kerjasama_model->jumlah_ar();
        $this->load->view('homepage', $data);
        // $this->load->view("homepage");
	}
}