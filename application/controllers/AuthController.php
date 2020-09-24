<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel/AuthModel');
	}

	// Load Login
	public function index()
	{
		if ($this->AuthModel->AuthorizeUser() == true) {
			redirect(base_url() . 'index.php/AuthController/dashboard');
		} else {
			$this->load->view('Login/login');
		}
	}


	//Login Method //

	public function login()
	{
		if ($this->AuthModel->AuthorizeUser() == true) {

			redirect(base_url() . 'index.php/AuthController/dashboard');
		} else {

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == true)
			 {
				$email = $this->input->post('email');
				$user = $this->AuthModel->CheckUser($email);
				if (!empty($user)) {
					// echo json_encode($user);
					$password = $this->input->post('password');
					if (password_verify($password, $user['user_password']) == true) {

						$sessArray['id'] = $user['user_id'];
						$sessArray['name'] = $user['name'];
						$sessArray['emai'] = $user['user_email'];

						$sessArray['username'] = $user['username'];
						$this->session->set_userdata('user', $sessArray);
						redirect(base_url() . 'index.php/AuthController/dashboard');
					} else {
						//
						$this->session->set_flashdata('msg', 'The E-mail address or password you entered was incorrect.');
						redirect(base_url() . 'index.php/AuthController');
					}
				} else {
					$this->session->set_flashdata('msg', 'The E-mail address or password you entered was incorrect.');
					redirect(base_url() . 'index.php/AuthController');
				}
			} else {
				$this->load->view('Login/login');
			}
		}
	}

	//Load Dashboard //

	public function dashboard()
	{
		if ($this->AuthModel->AuthorizeUser() == true) {
			$user = $this->session->userdata('user');
			$data['user'] = $user;

			$this->load->view('include/header', $data);

			$this->load->view('dashboard/dashboard', $data);

			$this->load->view('include/footer');
		} else {
			$this->session->set_flashdata('msg', "Access Denied ");
			redirect(base_url() . 'index.php/AuthController');
		}
	}

	//Logout Function

	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url() . 'index.php/AuthController');
	}
}
