<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('StudentModel/StudentModel');
		$this->load->model('FacultyModel/FacultyModel');
		$this->load->model('SFeeModel/SFeeModel');
		$this->load->model('FFeeModel/FFeeModel');
		$this->load->model('DeptModel/DeptModel');
		$this->load->model('ProgModel/ProgModel');
		$this->load->model('BusModel/BusModel');
		$this->load->model('DriverModel/DriverModel');		
		$this->load->model('AuthModel/AuthModel');
		$this->load->model('UserModel/UserModel');

		

		//Validate User Authorize or Not
		if (! $this->AuthModel->AuthorizeUser()) {
			redirect(base_url() . 'index.php/AuthController/');
		}


		
	}


	public function Student()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$list = $this->StudentModel->getAllStudent();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('student/list', $data);
		$this->load->view('include/footer');
	}
	// Loading StudentFee View
	public function StudentFee()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$list = $this->SFeeModel->getAllFeeStudent();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('studentfee/fee', $data);
		$this->load->view('include/footer');
	}

	// Loading FacultyFee View
	public function FacultyFee()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$list = $this->FFeeModel->getAllFeeFaculty();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('facultyfee/facultyfee', $data);
		$this->load->view('include/footer');
	}


	// Loading Faculty View
	public function Faculty()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$list = $this->FacultyModel->getAllFaculty();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('faculty/faculty', $data);
		$this->load->view('include/footer');
	}

	// Loading the StudentStats View

	public function getStudentStats()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$list = $this->StudentModel->StudentStatusData();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('studentstatus/studentstatus', $data);
		$this->load->view('include/footer');
	}

	// Loading the FacultyStats View

	public function getFacultyStats()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$list = $this->FacultyModel->FacultyStatusData();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('facultystatus/facultystatus', $data);
		$this->load->view('include/footer');
	}


	// Loading Department View
	public function Department()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$list = $this->DeptModel->getDepartmentData();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('Department/Department', $data);
		$this->load->view('include/footer');
	}

	// Loading Department View
	public function Program()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$list = $this->ProgModel->getProgramsData();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('Program/Program', $data);
		$this->load->view('include/footer');
	}

	// Loading Bus View
	public function Bus()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$list = $this->BusModel->getBusesData();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('Bus/Bus', $data);
		$this->load->view('include/footer');
	}

	// Loading Driver View
	public function Driver()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$list = $this->DriverModel->getDriverData();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('Driver/Driver', $data);
		$this->load->view('include/footer');
	}

	// Loading Driver View
	public function User()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$list = $this->UserModel->getUser();
		$data['rows'] = $list;
		$this->load->view('include/header',$data);
		$this->load->view('User/user', $data);
		$this->load->view('include/footer');
	}

	//Load Password Change View

	function ChangePassword()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$this->load->view('include/header',$data);
		$this->load->view('Login/ChangePassword',$data);
		$this->load->view('include/footer');
	}

	//Load BusLocation View
	function BusLocation()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$this->load->view('include/header',$data);
		$this->load->view('buslocation/buslocation');
		$this->load->view('include/footer');
	}

	//Load developer View
	function developer()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$this->load->view('include/header',$data);
		$this->load->view('developer/developer');
		$this->load->view('include/footer');
	}

	//Load AppUser View
	function AppUser()
	{
		//Geting Session Data
		$user = $this->session->userdata('user');
		$data['user'] = $user;

		$this->load->view('include/header',$data);
		$this->load->view('appuser/appuser');
		$this->load->view('include/footer');
	}






	
}
