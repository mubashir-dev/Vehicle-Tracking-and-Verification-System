<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel/UserModel');
		$this->load->model('AuthModel/AuthModel');

		//Validate User Authorize or Not
		if (!$this->AuthModel->AuthorizeUser()) {
			redirect(base_url() . 'index.php/AuthController/');
		}
	}

	//Load Bus Create Form
	public function showCreateForm()
	{
		// $driver_list = $this->BusModel->getDriverDetails();
		// $data['d_list'] = $driver_list;
		$html = $this->load->view('User/create', '', true);
		$response['html'] = $html;
		echo json_encode($response);
	}

	//Save user Model 
	public function saveUserModel()
	{
		$this->form_validation->set_message('is_unique', 'This %s is already Created');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.user_email]');

		if ($this->form_validation->run() == true) {

			$form_array = array();

			$form_array['username'] = $this->input->post('username');
			$form_array['name'] = $this->input->post('name');
			$form_array['user_type'] = "Admin";
			$form_array['user_password'] = password_hash($this->input->post('pass'), PASSWORD_BCRYPT);
			$form_array['user_email'] = $this->input->post('email');

			$id = $this->UserModel->saveUser($form_array);

			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>User Recored Created</div>";
		} else {
			$response['status'] = 0;
			$response['name'] = strip_tags(form_error('name'));
			$response['username'] = strip_tags(form_error('username'));
			$response['email'] = strip_tags(form_error('email'));
			$response['password'] = strip_tags(form_error('pass'));
		}
		echo json_encode($response);
	}

	//Update Form 
	public function updateUserForm($id)
	{

		$row = $this->UserModel->getUserRow($id);
		$data['row'] = $row;
		$html = $this->load->view('User/edit', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}


	//Update User Model
	public function updateUserModel()
	{


		$this->form_validation->set_message('is_unique', 'This %s is already Created');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		//	$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == true) {

			$form_array = array();


			$form_array['username'] = $this->input->post('username');
			$form_array['name'] = $this->input->post('name');
			$form_array['user_type'] = "Admin";
			if (!empty($this->input->post('pass'))) {
				$form_array['user_password'] = password_hash($this->input->post('pass'), PASSWORD_BCRYPT);
			}
			$form_array['user_email'] = $this->input->post('email');

			$id = $this->UserModel->updateUser($this->input->post('id'), $form_array);
			//Get The Single Row of Data
			$row = $this->UserModel->getUserRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('User/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>User Recored Updated</div>";;
		} else {
			$response['status'] = 0;
			$response['name'] = strip_tags(form_error('name'));
			$response['username'] = strip_tags(form_error('username'));
			$response['email'] = strip_tags(form_error('email'));
			// $response['password'] = strip_tags(form_error('pass'));
		}
		echo json_encode($response);
	}

	//Delete User Model

	public function deleteUserModel($id)
	{

		$flag = $this->UserModel->deleteUserModel($id);
		if ($flag == true) {
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-danger'>User Recored Deleted</div>";
		} else {
			$response['status'] = 0;
			$response['message'] = "<div class='alert alert-danger'>User Recored Not  Deleted</div>";
		}

		echo json_encode($response);
	}

	// ChangePassword 

	function ChangePassword()
	{
		$this->form_validation->set_message('checkCurrentPassword', 'Your Typed Password  Is Not Matched With Our Recored');
		$this->form_validation->set_rules('curr_pass', 'Current Password', 'required');
		$this->form_validation->set_rules('new_pass', 'New Password', 'required');
		$this->form_validation->set_rules('rep_pass', 'Repeat Password', 'required');

		if ($this->form_validation->run() == true) {

			$form_array = array();
			$form_array['user_password'] = password_hash($this->input->post('new_pass'), PASSWORD_BCRYPT);

			$result= $this->UserModel->changePassword($this->input->post('id'), $form_array);
			//Get The Single Row of Data
			if($result)
			{
				$response['status'] = 1;
				$response['message'] = "<div class='alert alert-success'>Your Password has been Successfully Changed</div>";
			}
			else
			{
				$response['status'] = -1;
				$response['message'] = "<div class='alert alert-success'>Error Password not changed</div>";
			}
			
			
		} else {
			$response['status'] = 0;
			$response['curr_pass'] = strip_tags(form_error('curr_pass'));
			$response['new_pass'] = strip_tags(form_error('new_pass'));
			$response['rep_pass'] = strip_tags(form_error('rep_pass'));
		}
		echo json_encode($response);
	}

	//Check Current Password

	function checkCurrentPassword($password)
	{
		$user = $this->UserModel->verifyPassword($password);

		if (password_verify($password, $user['user_password']) == true) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
