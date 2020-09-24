<?php
class SFeeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SFeeModel/SFeeModel');
		$this->load->model('StudentModel/StudentModel');
	}

	//Load Student Create Form
	public function showCreateForm()
	{

		$Student_data = $this->SFeeModel->getStudentData();
	//	$data['student'] = $Student_data;

		if (!empty($Student_data)) {
			foreach ($Student_data as $row) {
				$route=$this->SFeeModel->getRouteCharges($row['route_id']);
				$data['student_id']=$row['student_id'];				
				$data['fee_amount']=12000;
				$data['fee_date']=date('Y-m-d');
				$data['status']=false;
				$this->SFeeModel->loadData($data);
				$student_data=array();
				$student_data['fee_data_link']=1;
				$this->StudentModel->updateFeeLink($row['student_id'],$student_data);

			}
			$response['message'] = "<div class='alert alert-success'>Student Recored Added </div>";
		} else {
			$response['message'] = "<div class='alert alert-success'>No New Student Recored Found</div>";
		}
		echo json_encode($response);
	}

	
	//Pay Student Fee
	function payStudentFee()
	{
		$id = $this->input->post('id');
		$data['fee_date'] = date('Y-m-d');
		$data['status'] = true;
		$this->SFeeModel->feeStudentPay($id, $data);
		$response['message'] = "<div class='alert alert-success'>Student Fee Has Been Successfully Payed</div>";

		// $response['message'] = "<div class='alert alert-success'>No New Faculty Recored Found</div>";

		echo json_encode($response);
	}




	//Save Faculty Model 
	public function saveFacultyModel()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('faculty_no',  'Faculty Number ', 'required|is_unique[faculty.faculty_no]');
		$this->form_validation->set_rules('cnic', 'Cnic ', 'required|is_unique[faculty.faculty_cnic]');
		$this->form_validation->set_rules('bus', 'Bus', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required|regex_match[/^[0-9]{11}$/]|is_unique[faculty.faculty_contact]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('dept', 'Department', 'required');
		$this->form_validation->set_rules('route', 'Route', 'required');


		if ($this->form_validation->run() == true) {
			$form_array = array();
			$form_array['faculty_name'] = $this->input->post('name');
			$form_array['faculty_no'] = $this->input->post('faculty_no');
			$form_array['faculty_cnic'] = $this->input->post('cnic');
			$form_array['bus_id'] = $this->input->post('bus');
			$form_array['dept_id'] = $this->input->post('dept');
			$form_array['faculty_contact'] = $this->input->post('contact');
			$form_array['route_id'] = $this->input->post('route');
			$form_array['faculty_address'] = $this->input->post('address');
			$id = $this->FacultyModel->createFaculty($form_array);
			//Get The Single Row of Data
			$row = $this->FacultyModel->getFacultyRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('faculty/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Faculty Recored Created</div>";
		} else {
			$response['status'] = 0;
			$response['name'] = strip_tags(form_error('name'));
			$response['faculty_no'] = strip_tags(form_error('faculty_no'));
			$response['cnic'] = strip_tags(form_error('cnic'));
			$response['bus'] = strip_tags(form_error('bus'));
			$response['contact'] = strip_tags(form_error('contact'));
			$response['address'] = strip_tags(form_error('address'));
			$response['dept'] = strip_tags(form_error('dept'));
			$response['route'] = strip_tags(form_error('route'));
		}
		echo json_encode($response);
	}



	//Update Form 
	public function updateFacultyForm($id)
	{
		$row = $this->FacultyModel->getFacultyRow($id);
		$data['row'] = $row;
		$bus_id = $row['bus_id'];
		$dept_id = $row['bus_id'];
		$route_id = $row['route_id'];
		$department_list = $this->FacultyModel->getDepartmentDetails();
		$route_list = $this->FacultyModel->getRouteDetails();
		$bus_list = $this->FacultyModel->getBusDetails();
		$data['d_list'] = $department_list;
		$data['r_list'] = $route_list;
		$data['b_list'] = $bus_list;
		$html = $this->load->view('faculty/edit', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}


	//Update FacultyModel
	public function updateFacultyModel()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('faculty_no',  'Faculty Number ', 'required');
		$this->form_validation->set_rules('cnic', 'Cnic ', 'required');
		$this->form_validation->set_rules('bus', 'Bus', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required|regex_match[/^[0-9]{11}$/]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('dept', 'Department', 'required');
		$this->form_validation->set_rules('route', 'Route', 'required');


		if ($this->form_validation->run() == true) {
			$form_array = array();
			$form_array['faculty_name'] = $this->input->post('name');
			$form_array['faculty_no'] = $this->input->post('faculty_no');
			$form_array['faculty_cnic'] = $this->input->post('cnic');
			$form_array['bus_id'] = $this->input->post('bus');
			$form_array['dept_id'] = $this->input->post('dept');
			$form_array['faculty_contact'] = $this->input->post('contact');
			$form_array['route_id'] = $this->input->post('route');
			$form_array['faculty_address'] = $this->input->post('address');
			$id = $this->FacultyModel->updateFacultyModel($this->input->post('id'), $form_array);
			//Get The Single Row of Data
			$row = $this->FacultyModel->getFacultyRow($id);
			$data['row'] = $row;
			$rowhtml = $this->load->view('faculty/single_row', $data, true);
			$response['row'] = $rowhtml;
			$response['status'] = 1;
			$response['message'] = "<div class='alert alert-success'>Faculty Recored Updated</div>";
		} else {
			$response['status'] = 0;
			$response['name'] = strip_tags(form_error('name'));
			$response['faculty_no'] = strip_tags(form_error('faculty_no'));
			$response['cnic'] = strip_tags(form_error('cnic'));
			$response['bus'] = strip_tags(form_error('bus'));
			$response['contact'] = strip_tags(form_error('contact'));
			$response['address'] = strip_tags(form_error('address'));
			$response['dept'] = strip_tags(form_error('dept'));
			$response['route'] = strip_tags(form_error('route'));
		}
		echo json_encode($response);
	}

	//Delete Faculty Model

	public function deleteFacultyModel($id)
	{
		$this->FacultyModel->deleteFacultyModel($id);
		$response['status'] = 1;
		$response['message'] = "<div class='alert alert-danger'>Faculty Recored Deleted</div>";

		echo json_encode($response);
	}


	//Get The Information of Single Faculty
	public function FacultyInformation()
	{
		//Get Id Through Ajax Request
		$id = $this->input->post('id');

		$row = $this->FacultyModel->getFacultyRow($id);
		$bus_id = $row['bus_id'];
		$dept_id = $row['dept_id'];
		$route_id = $row['route_id'];
		$department_list = $this->FacultyModel->getDepartmentDetails();
		$route_list = $this->FacultyModel->getRouteDetails();
		$bus_list = $this->FacultyModel->getBusDetails();
		$data['d_list'] = $department_list;
		$data['r_list'] = $route_list;
		$data['b_list'] = $bus_list;
		$data['row'] = $row;
		$html = $this->load->view('faculty/details', $data, true);
		$response['html'] = $html;
		echo json_encode($response);
	}
}
