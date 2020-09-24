<?php
class StudentController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('StudentModel/StudentModel');
	}

	//Load Student Create Form
	public function showCreateForm()
	{
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
		$html = $this->load->view('student/create', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}

	//Save Student Model 
	public function saveStudentModel()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('sturegon', 'Reg No', 'required');
		$this->form_validation->set_rules('bus', 'Bus', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('program', 'Program', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('dept', 'Department', 'required');
		$this->form_validation->set_rules('route', 'Route', 'required');


		if ($this->form_validation->run() == true) {
			$form_array = array();
			
			$form_array['student_reg_no'] = $this->input->post('sturegon');
			$form_array['student_name'] = $this->input->post('name');
			$form_array['bus_id'] = $this->input->post('bus');
			$form_array['course_id'] = $this->input->post('program');
			$form_array['semester_id '] = $this->input->post('semester');
			$form_array['dept_id'] = $this->input->post('dept');
			$form_array['student_contact'] = $this->input->post('contact');
			$form_array['route_id'] = $this->input->post('route');
			$form_array['student_address'] = $this->input->post('address');

			$id = $this->StudentModel->createStudent($form_array);
			//Get The Single Row of Data
			$row = $this->StudentModel->getStudentRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('student/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Student Recored Created</div>";
		} else {
			$response['status'] = 0;
			$response['name'] = strip_tags(form_error('name'));
			$response['sturegon'] = strip_tags(form_error('sturegon'));
			$response['bus'] = strip_tags(form_error('bus'));
			$response['contact'] = strip_tags(form_error('contact'));
			$response['address'] = strip_tags(form_error('address'));
			$response['dept'] = strip_tags(form_error('dept'));
			$response['route'] = strip_tags(form_error('route'));
			$response['program'] = strip_tags(form_error('program'));
			$response['semester'] = strip_tags(form_error('semester'));
		}
		echo json_encode($response);
	}



	//Update Form 
	public function updateStudentForm($id)
	{
		$row = $this->StudentModel->getStudentRow($id);
		$data['row'] = $row;
		$bus_id = $row['bus_id'];
		$dept_id = $row['bus_id'];
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
		$html = $this->load->view('student/edit', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}


	//Update StudentModel
	public function updateStudentModel()
	{
		$this->form_validation->set_rules('sturegon', 'Reg No', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('bus', 'Bus', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('program', 'Program', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('dept', 'Department', 'required');
		$this->form_validation->set_rules('route', 'Route', 'required');


		if ($this->form_validation->run() == true) {
			$form_array = array();
			$form_array['student_reg_no'] = $this->input->post('sturegon');
			$form_array['student_name'] = $this->input->post('name');
			$form_array['bus_id'] = $this->input->post('bus');
			$form_array['course_id'] = $this->input->post('program');
			$form_array['semester_id '] = $this->input->post('semester');
			$form_array['dept_id'] = $this->input->post('dept');
			$form_array['student_contact'] = $this->input->post('contact');
			$form_array['route_id'] = $this->input->post('route');
			$form_array['student_address'] = $this->input->post('address');
			$id = $this->StudentModel->updateStudentModel($this->input->post('id'), $form_array);
			//Get The Single Row of Data
			$row = $this->StudentModel->getStudentRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('student/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Student Recored Updated</div>";
		} else {
			$response['status'] = 0;
			$response['sturegon'] = strip_tags(form_error('sturegon'));
			$response['name'] = strip_tags(form_error('name'));
			$response['bus'] = strip_tags(form_error('bus'));
			$response['contact'] = strip_tags(form_error('contact'));
			$response['address'] = strip_tags(form_error('address'));
			$response['dept'] = strip_tags(form_error('dept'));
			$response['route'] = strip_tags(form_error('route'));
			$response['program'] = strip_tags(form_error('program'));
			$response['semester'] = strip_tags(form_error('semester'));
		}
		echo json_encode($response);
	}

	//Delete StudentModel

	public function deleteStudentModel($id)
	{
		$this->StudentModel->deleteStudentModel($id);
		$response['status'] = 1;
		$response['message'] = "<div class='alert alert-danger'>Student Recored Deleted</div>";

		echo json_encode($response);
	}


	//Get The Information of Single Student
	public function studentInformation()
	{
		//Get Id Through Ajax Request
		$id=$this->input->post('id');
		
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
		$data['row']=$row;
		$html = $this->load->view('student/details', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}

}
