<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BusLocationController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BusModel/BusModel');
		$this->load->model('AuthModel/AuthModel');

		
		//Validate User Authorize or Not
		if ($this->AuthModel->AuthorizeUser() == true) {
			redirect(base_url() . 'index.php/AuthController/dashboard');
		} else {
			redirect(base_url() . 'index.php/AuthController/');
		}

	}

	}
