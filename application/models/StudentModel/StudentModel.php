<?php
class StudentModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//MethodForCreatingStudent//
	public function createStudent($dataArray)
	{
		$this->db->insert('student', $dataArray);
		return $id = $this->db->insert_id();
	}

	//ListingStudentRecored//

	public function getAllStudent()
	{
		$query = $this->db->select('student.*,bus.bus_tag_number,department.dept_name,courses.course_name,semester.semester_level,route.route_name')
			->from('student')
			->join('bus',          'bus.bus_id=student.bus_id')
			->join('department',   'department.dept_id=student.dept_id')
			->join('courses',      'courses.course_id=student.course_id')
			->join('semester',     'semester.semester_id=student.semester_id')
			->join('route',         'route.route_id=student.route_id')
			->get();
		//	print_r($query->result_array());
		return $query->result_array();
	}

	//Get The Single Row of Recored Latest One : Last //
	public function getStudentRow($id)
	{
		$this->db->where('student_id', $id);
		$query = $this->db->select('student.*,bus.bus_tag_number,department.dept_name,courses.course_name,semester.semester_level,route.route_name')
			->from('student')
			->join('bus',          'bus.bus_id=student.bus_id')
			->join('department',   'department.dept_id=student.dept_id')
			->join('courses',      'courses.course_id=student.course_id')
			->join('semester',     'semester.semester_id=student.semester_id')
			->join('route',         'route.route_id=student.route_id')
			->get();

		return $query->row_array();
	}

	//Update Model

	function updateStudentModel($id, $formarray)
	{
		$this->db->where('student_id', $id);
		$this->db->update('student', $formarray);
		return $id;
	}


	//DeleteStudent

	function deleteStudentModel($id)
	{
		$this->db->where('student_id', $id);
		$this->db->delete('student');
		return $id;
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

	function updateFeeLink($id,$formarray)
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
