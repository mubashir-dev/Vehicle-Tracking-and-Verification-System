<?php
class FFeeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//MethodForCreatingFaculty//
	public function loadData($dataArray)
	{
		$this->db->insert('faculty_fee', $dataArray);
		//return $id = $this->db->insert_id();
	}

	//MethodForCreatingFaculty//
	public function getFacultyData()
	{
		$query=$this->db->where('fee_data_link', 0)
						->from('faculty')
						->get();
		return $query->result_array();
	}

	//Fee Pay Faculty

	function feeFacultyPay($id,$formarray)
	{
		$this->db->where('faculty_id', $id);
		$this->db->update('faculty_fee', $formarray);

	}
	//ListingFacultyRecored//

	public function getAllFeeFaculty()
	{
		$query = $this->db->select('faculty_fee.*,faculty.faculty_name,faculty.faculty_no')
			->from('faculty_fee')
			->join('faculty', 'faculty.faculty_id=faculty_fee.faculty_id')
			->get();
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

	// Find Route Charges
	function getRouteCharges($id)
	{

		$this->db->where('route_id', $id);
		$query = $this->db->get('route');
		return $query->result_array();
	}
}
