<?php
class ProgController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProgModel/ProgModel');
	}

	//Load Student Create Form
	public function showCreateForm()
	{
		$department_list = $this->ProgModel->getDepartmentDetails();
		$data['d_list'] = $department_list;
		$html = $this->load->view('Program/create', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}

	//Save Program Model 
	public function saveProgramModel()
	{
		$this->form_validation->set_message('is_unique', 'This %s is already Created');
		$this->form_validation->set_rules('name', 'Program', 'required|is_unique[courses.course_name]');
		$this->form_validation->set_rules('dept', 'Department', 'required');
		if ($this->form_validation->run() == true) {
			$form_array = array();

			$form_array['dept_id'] = $this->input->post('dept');
			$form_array['course_name'] = $this->input->post('name');

			$id = $this->ProgModel->createProgram($form_array);
			//Get The Single Row of Data
			$row = $this->ProgModel->getProgramRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('Program/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Program Recored Created</div>";
		} else {
			$response['status'] = 0;
			$response['dept'] = strip_tags(form_error('name'));
			$response['name'] = strip_tags(form_error('dept'));
			
		}
		echo json_encode($response);
	}



	//Update Form 
	public function updateProgramForm($id)
	{
		
		$row = $this->ProgModel->getProgramRow($id);
		$data['row'] = $row;
		$department_list = $this->ProgModel->getDepartmentDetails();
		$data['d_list'] = $department_list;
		$html = $this->load->view('Program/edit', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}


	//Update Program Model
	public function updateProgram()
	{
		$this->form_validation->set_rules('dept', 'Department', 'required');
		$this->form_validation->set_rules('name', 'Program', 'required');

		if ($this->form_validation->run() == true) {
			$form_array = array();

			$form_array['course_name'] = $this->input->post('name');
			$form_array['dept_id'] = $this->input->post('dept');

			$id = $this->ProgModel->updateProgramModel($this->input->post('id'), $form_array);
			//Get The Single Row of Data
			$row = $this->ProgModel->getProgramRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('Program/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Program Recored Updated</div>";
		} else {
			$response['status'] = 0;
			$response['dept'] = strip_tags(form_error('name'));
			$response['name'] = strip_tags(form_error('dept'));
			
		}
		echo json_encode($response);
	}

	//Delete Program Model

	public function deleteProgramModel($id)
	{

		$flag = $this->ProgModel->deleteProgramModel($id);
		if ($flag == true) {
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-danger'>Program Recored Deleted</div>";
		} else {
			$response['status'] = 0;
			$response['message'] = "<div class='alert alert-danger'>Program Recored Not  Deleted</div>";
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
