<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tingkatan extends CI_Controller{
    public function __construct(){
        parent::__construct();
		$this->load->library('form_validation');
        $this->load->model("admin/tingkatan_model");
    }

    public function index()
    {
        // $data['tingkatan'] = $this->tingkatan_model->getAll();
        // $this->load->view("panel/tingkatan", $data);
        $this->load->view("panel/tingkatan");
    }
}