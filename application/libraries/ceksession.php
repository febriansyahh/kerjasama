<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ceksession
{
	protected $_ci;
	function __construct()
	{
		$this->_ci = &get_instance();
	}

	function user()
	{
		if (!$this->_ci->session->userdata('username')) {
			return redirect('login');
		}
		return;
	}
}
