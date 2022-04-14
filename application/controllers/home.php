<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
        $this->load->model("kerjasama_model");
	}

	public function index()
	{
		$data["moa"] = $this->kerjasama_model->jumlah_moa();
		$data["riks"] = $this->kerjasama_model->jumlah_riks();
		$data["ar"] = $this->kerjasama_model->jumlah_ar();
        $this->load->view('homepage', $data);
        // $this->load->view("homepage");
	}
}