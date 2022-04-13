<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kerjasama_PUD extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/kerjasama_PUD_model");
    }

    public function index(){
        $data["getAll"] = $this->kerjasama_PUD_model->getAll();
        $this->load->view('panel/kerjasama_PUD', $data);
    }

    public function detail($id){
 
		$data["detail"] =$this->kerjasama_PUD_model->get_detail($id);
        $data["getrks"] = $this->kerjasama_PUD_model->rks($id);
        $data["getar"] = $this->kerjasama_PUD_model->ar($id);
		$this->load->view('panel/D_kerjasama_PUD', $data);
        
 
	}

}