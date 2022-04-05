<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class overview extends CI_Controller
{
    public function _construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("overview");
    }
}