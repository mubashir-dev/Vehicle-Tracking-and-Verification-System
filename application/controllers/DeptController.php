<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DeptController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DeptModel/DeptModel');
	}

	//Load Student Create Form
	public function showCreateForm()
	{
		$html = $this->load->view('Department/create', '', true);
		$response['html'] = $html;
		echo json_encode($response);
	}

	//Save Department Model 
	public function saveDepartmentModel()
	{
		$this->form_validation->set_message('is_unique', 'This %s is already Created');
		$this->form_validation->set_rules('dept', 'Department', 'required|is_unique[department.dept_name]');

		if ($this->form_validation->run() == true) {
			$form_array = array();

			$form_array['dept_name'] = $this->input->post('dept');

			$id = $this->DeptModel->createDepartment($form_array);
			//Get The Single Row of Data
			$row = $this->DeptModel->getDepartmentRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('Department/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Department Recored Created</div>";
		} else {
			$response['status'] = 0;
			$response['deptname'] = strip_tags(form_error('dept'));
		}
		echo json_encode($response);
	}



	//Update Form 
	public function updateDepartmentForm($id)
	{
		$row = $this->DeptModel->getDepartmentRow($id);
		$data['row'] = $row;
		$html = $this->load->view('Department/edit', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}


	//Update DepartmentModel
	public function updateDepartment()
	{
		// $this->form_validation->set_message('is_unique', 'This %s is already Created');
		$this->form_validation->set_rules('dept', 'Department', 'required');


		if ($this->form_validation->run() == true) {
			$form_array = array();
			$form_array['dept_name'] = $this->input->post('dept');
			$id = $this->DeptModel->updateDepartmentModel($this->input->post('id'), $form_array);
			//Get The Single Row of Data
			$row = $this->DeptModel->getDepartmentRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('Department/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Department Recored Updated</div>";
		} else {
			$response['status'] = 0;
			$response['deptname'] = strip_tags(form_error('dept'));
		}
		echo json_encode($response);
	}

	//Delete DepartmentModel

	public function deleteDepartmentModel($id)
	{

		$flag = $this->DeptModel->deleteDepartmentModel($id);
		if ($flag == true) {
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-danger'>Department Recored Deleted</div>";
		} else {
			$response['status'] = 0;
			$response['message'] = "<div class='alert alert-danger'>Department Recored Not  Deleted</div>";
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
