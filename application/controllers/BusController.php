<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BusController extends CI_Controller
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

	//Load Bus Create Form
	public function showCreateForm()
	{
		$driver_list = $this->BusModel->getDriverDetails();
		$data['d_list'] = $driver_list;
		$html = $this->load->view('Bus/create',$data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}

	//Save Bus Model 
	public function saveBusModel()
	{
		$this->form_validation->set_message('is_unique', 'This %s is already Created');
		$this->form_validation->set_rules('bus', 'Bus Number', 'required|is_unique[bus.bus_number]');
		$this->form_validation->set_rules('busmodel', 'Bus Model', 'required');
		$this->form_validation->set_rules('bustag', 'Bus Tag', 'required|is_unique[bus.bus_tag_number]');
		$this->form_validation->set_rules('driver', 'Driver', 'required|is_unique[bus.driver_id]');
		if ($this->form_validation->run() == true) {
			$form_array = array();

			$form_array['driver_id'] = $this->input->post('driver');
			$form_array['bus_number'] = $this->input->post('bus');
			$form_array['bus_model'] = $this->input->post('busmodel');
			$form_array['bus_tag_number'] = $this->input->post('bustag');

			$id = $this->BusModel->createBus($form_array);
			//Get The Single Row of Data
			$row = $this->BusModel->getBusRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('Bus/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Bus Recored Created</div>";
		} else {
			$response['status'] = 0;
			$response['bus'] = strip_tags(form_error('bus'));
			$response['busmodel'] = strip_tags(form_error('busmodel'));
			$response['bustag'] = strip_tags(form_error('bustag'));
			$response['driver'] = strip_tags(form_error('driver'));
			
		}
		echo json_encode($response);
	}



	//Update Form 
	public function updateBusForm($id)
	{
		
		$row = $this->BusModel->getBusRow($id);
		$data['row'] = $row;
		$driver_list = $this->BusModel->getDriverDetails();
		$data['d_list'] = $driver_list;
		$html = $this->load->view('Bus/edit', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}


	//Update Program Model
	public function updateBus()
	{













		$this->form_validation->set_message('is_unique', 'This %s is already Created');
		$this->form_validation->set_rules('bus', 'Bus Number', 'required');
		$this->form_validation->set_rules('busmodel', 'Bus Model', 'required');
		$this->form_validation->set_rules('bustag', 'Bus Tag', 'required');
		$this->form_validation->set_rules('driver', 'Driver', 'required');
		if ($this->form_validation->run() == true) {
			$form_array = array();

			$form_array['driver_id'] = $this->input->post('driver');
			$form_array['bus_number'] = $this->input->post('bus');
			$form_array['bus_model'] = $this->input->post('busmodel');
			$form_array['bus_tag_number'] = $this->input->post('bustag');

			$id = $this->BusModel->updateBusModel($this->input->post('id'), $form_array);
			//Get The Single Row of Data
			$row = $this->BusModel->getBusRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('Bus/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Bus Recored Updated</div>";
		} else {
			$response['status'] = 0;
			$response['bus'] = strip_tags(form_error('bus'));
			$response['busmodel'] = strip_tags(form_error('busmodel'));
			$response['bustag'] = strip_tags(form_error('bustag'));
			$response['driver'] = strip_tags(form_error('driver'));
			
		}
		echo json_encode($response);
	}

	//Delete Program Model

	public function deleteBusModel($id)
	{

		$flag = $this->BusModel->deleteBusModel($id);
		if ($flag == true) {
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-danger'>Bus Recored Deleted</div>";
		} else {
			$response['status'] = 0;
			$response['message'] = "<div class='alert alert-danger'>Bus Recored Not  Deleted</div>";
		}

		echo json_encode($response);
	}


	//Get The Information of Single Department
	public function studentInformation()
	{
		//Get Id Through Ajax Request
		$id = $this->input->post('id');

		$row = $this->StudentModel->getStudentRow($id);
		$bus_id = $row['bus_id'];
		$dept_id = $row['dept_id'];
		$route_id = $row['route_id'];
		$semester_id = $row['semester_id'];
		$semester_list = $this->StudentModel->getSemesterDetails();
		$program_list = $this->StudentModel->getProgramDetails();
		$department_list = $this->StudentModel->getDepartmentDetails();
		$route_list = $this->StudentModel->getRouteDetails();
		$bus_list = $this->StudentModel->getBusDetails();
		$data['l_list'] = $semester_list;
		$data['p_list'] = $program_list;
		$data['d_list'] = $department_list;
		$data['r_list'] = $route_list;
		$data['b_list'] = $bus_list;
		$data['row'] = $row;
		$html = $this->load->view('student/details', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}
}
