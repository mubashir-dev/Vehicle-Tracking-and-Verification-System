<?php
class FacultyModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//MethodForCreatingFaculty//
	public function createFaculty($dataArray)
	{
		$this->db->insert('faculty', $dataArray);
		return $id = $this->db->insert_id();
	}

	//ListingFacultyRecored//

	public function getAllFaculty()
	{
		$query = $this->db->select('faculty.*,bus.bus_tag_number,department.dept_name,route.route_name')
			->from('faculty')
			->join('bus',          'bus.bus_id=faculty.bus_id')
			->join('department',   'department.dept_id=faculty.dept_id')
			->join('route',         'route.route_id=faculty.route_id')
			->get();	//	print_r($query->result_array());
		return $query->result_array();
	}

	//Get The Single Row of Recored Latest One : Last //
	public function getFacultyRow($id)
	{
		$this->db->where('faculty_id', $id);
		$query = $this->db->select('faculty.*,bus.bus_tag_number,department.dept_name,route.route_name')
			->from('faculty')
			->join('bus',          'bus.bus_id=faculty.bus_id')
			->join('department',   'department.dept_id=faculty.dept_id')
			->join('route',         'route.route_id=faculty.route_id')
			->get();

		return $query->row_array();
	}

	//Update Model

	public function updateFacultyModel($id, $formarray)
	{
		$this->db->where('faculty_id', $id);
		$this->db->update('faculty', $formarray);
		return $id;
	}


	//Delete Faculty

	function deleteFacultyModel($id)
	{
		$this->db->where('faculty_id', $id);
		$this->db->delete('faculty');
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

	// Update Fee_Link Student

	function updateFeeLink($id,$formarray)
	{
		$this->db->where('faculty_id', $id);
		$this->db->update('faculty', $formarray);
		return $id;
	}

	//Add Data Into Student Status Table
	public function CreateFacultyStatus($dataArray)
	{
		$this->db->insert('faculty_status', $dataArray);
		//return $id = $this->db->insert_id();
		
	}

		// Get The StudentStatusData

		public function FacultyStatusData()
		{
			$query = $this->db->select('faculty_status.*,faculty.faculty_name,faculty.faculty_id,faculty.faculty_no')
				->from('faculty_status')
				->join('faculty', 'faculty.faculty_id=faculty_status.faculty_id')
				->get();
			return $query->result_array();
		}
	
		
}
