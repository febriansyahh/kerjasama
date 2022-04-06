<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model('login_model');
 		$this->load->library('session');
	}

	public function index()
	{
        $this->load->view("login");
	}

	public function cekLogin()
	{
		$username = $this->input->post('username');
		$password = MD5($this->input->post('password'));

		// var_dump($username);
		// var_dump($password);
		// die();

		$cek_user = $this->login_model->userdaftar($username);

		if($cek_user)
		{
			$ceklogin = $this->login_model->ceklogin($username, $password);
			if($ceklogin)
			{
				foreach($ceklogin as $value)
				{
					if($value)
					{
						$this->session->set_userdata('idUser', $value->idUser);
						$this->session->set_userdata('idUnit', $value->idUnit);
						$this->session->set_userdata('nmUser', $value->nmUser);
						$this->session->set_userdata('username', $value->username);
						$this->session->set_userdata('levelUser', $value->levelUser);
						$this->session->set_userdata('status', $value->status);

						if( ($this->session->userdata('levelUser')== '1' || $this->session->userdata('levelUser')== '2' || $this->session->userdata('levelUser')== '3') )
						{
							redirect('admin/overview');
						}else{
							echo "<script>alert(' Maaf anda tdk memiliki akses');document.location='index' </script>";
						}
					}else{
						echo "<script>alert(' maaf username belum aktif!');document.location='index' </script>";
					}
				}
			}else{
				echo "<script>alert(' username atau password anda salah !!');document.location='index'; </script>";
			}
		}else{
			echo "<script>alert(' username belum terdaftar!!');document.location='index'; </script>";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}