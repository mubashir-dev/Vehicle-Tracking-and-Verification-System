<?php
class ProgModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//MethodForCreatingProgram//
	public function createProgram($dataArray)
	{
		$this->db->insert('courses', $dataArray);
		return $id = $this->db->insert_id();
	}

	//List Program Data
	public function getProgramsData()
	{
		$query = $this->db->select('courses.*,department.dept_name')
		->from('courses')
		->join('department', 'department.dept_id=courses.dept_id')
		->get();
	return $query->result_array();

	}

	//Get The Single Row of Recored Latest One : Last //
	public function getProgramRow($id)
	{
		$query = $this->db->where('course_id', $id)
			->from('courses')
			->get();

		return $query->row_array();
	}

	//Update Model

	function updateProgramModel($id, $formarray)
	{
		$this->db->where('course_id', $id);
		$this->db->update('courses', $formarray);
		return $id;
	}


	//Delete Program

	function deleteProgramModel($id)
	{
		if(!$this->db->where('courses','course_id', $id))
		{
			return $this->db->error();
		}
		else
		{
			return FALSE;
		}
	}


	//Fetching Others Details


	// Fetch Semester 
	function getSemesterDetails()
	{
		$query = $this->db->get("semester");
		//print_r($query->result_array());
		return $query->result_array();
	}

	// Fetch Programs
	function getProgramDetails()
	{
		$query = $this->db->get("courses");
		//print_r($query->result_array());
		return $query->result_array();
	}

	//Fetch Department
	function getDepartmentDetails()
	{
		$query = $this->db->get("department");
		//print_r($query->result_array());
		return $query->result_array();
	}

	// Fetch Routes
	function getRouteDetails()
	{
		$query = $this->db->get("route");
		//print_r($query->result_array());
		return $query->result_array();
	}

	//Fetch Bus
	function getBusDetails()
	{
		$query = $this->db->get("bus");
		//print_r($query->result_array());
		return $query->result_array();
	}

	// Add Data into Fee Table

	function addFee($dataArray)
	{
		$this->db->insert('fee', $dataArray);
		return $id = $this->db->insert_id();
	}

	// Find Route Charges
	function getRouteCharges($id)
	{

		$this->db->where('route_id', $id);
		$query = $this->db->get('route');
		return $query->result_array();
	}

	// Update Fee_Link Student

	function updateFeeLink($id, $formarray)
	{
		$this->db->where('student_id', $id);
		$this->db->update('student', $formarray);
		return $id;
	}

	//Add Data Into Student Status Table
	public function CreateStudentStatus($dataArray)
	{
		$this->db->insert('status', $dataArray);
		//return $id = $this->db->insert_id();

	}

	// Get The StudentStatusData

	public function StudentStatusData()
	{
		$query = $this->db->select('status.*,student.student_name,student.student_id,student.student_reg_no')
			->from('status')
			->join('student', 'student.student_id=status.student_id')
			->get();
		return $query->result_array();
	}
}


