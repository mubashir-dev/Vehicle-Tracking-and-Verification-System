<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DriverController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DriverModel/DriverModel');
	}

	//Load Student Create Form
	public function showCreateForm()
	{
		$html = $this->load->view('Driver/create', '', true);
		$response['html'] = $html;
		echo json_encode($response);
	}

	//Save Driver Model 
	public function saveDriverModel()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required|regex_match[/^[0-9]{11}$/]|is_unique[faculty.faculty_contact]');
		$this->form_validation->set_rules('address', 'Address', 'required');

		if ($this->form_validation->run() == true) {
			$form_array = array();

			$form_array['driver_name'] = $this->input->post('name');
			$form_array['driver_contact'] = $this->input->post('contact');
			$form_array['driver_address'] = $this->input->post('address');

			$id = $this->DriverModel->createDriver($form_array);
			//Get The Single Row of Data
			$row = $this->DriverModel->getDriverRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('Driver/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Driver Recored Created</div>";
		} else {
			$response['status'] = 0;
			$response['name'] = strip_tags(form_error('name'));
			$response['contact'] = strip_tags(form_error('contact'));
			$response['address'] = strip_tags(form_error('address'));

		}
		echo json_encode($response);
	}



	//Update Form 
	public function updateDriverForm($id)
	{
		$row = $this->DriverModel->getDriverRow($id);
		$data['row'] = $row;
		$html = $this->load->view('Driver/edit', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}


	//Update DriverModel
	public function updateDriver()
	{


		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required|regex_match[/^[0-9]{11}$/]');
		$this->form_validation->set_rules('address', 'Address', 'required');

		if ($this->form_validation->run() == true) {
			$form_array = array();

			$form_array['driver_name'] = $this->input->post('name');
			$form_array['driver_contact'] = $this->input->post('contact');
			$form_array['driver_address'] = $this->input->post('address');

			$id = $this->DriverModel->updateDriverModel($this->input->post('id'), $form_array);
			//Get The Single Row of Data
			$row = $this->DriverModel->getDriverRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('Driver/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Driver Recored Updated</div>";
		} else {
			$response['status'] = 0;
			$response['name'] = strip_tags(form_error('name'));
			$response['contact'] = strip_tags(form_error('contact'));
			$response['address'] = strip_tags(form_error('address'));

		}
		echo json_encode($response);
	}

	//Delete DriverModel

	public function deleteDriverModel($id)
	{

		$flag = $this->DriverModel->deleteDriverModel($id);
		if ($flag == true) {
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-danger'>Driver Recored Deleted </div>";
		} else {
			$response['status'] = 0;
			$response['message'] = "<div class='alert alert-danger'>Driver Recored Not  Deleted <br> Beacuse Multiple Referance Found </div>";
		}

		echo json_encode($response);
	}


	//Get The Information of Single Driver
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
		$Driver_list = $this->StudentModel->getDriverDetails();
		$route_list = $this->StudentModel->getRouteDetails();
		$bus_list = $this->StudentModel->getBusDetails();
		$data['l_list'] = $semester_list;
		$data['p_list'] = $program_list;
		$data['d_list'] = $Driver_list;
		$data['r_list'] = $route_list;
		$data['b_list'] = $bus_list;
		$data['row'] = $row;
		$html = $this->load->view('student/details', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}
}
