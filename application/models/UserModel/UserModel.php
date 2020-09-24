<?php
class UserModel extends CI_Model
{
public function __construct()
{
	parent::__construct();
}



//Save Register Data In DB
function saveUser($data_array)
{
	$this->db->insert("users",$data_array);
}
// Get User Data
function getUser()
{
	$query = $this->db->get('users');
	return $query->result_array();
}

// Get Single Row
function getUserRow($id)
{
	$this->db->where('user_id',$id);
		$row=$this->db->get("users")->row_array();
		return $row;

}

// Delete User
function deleteUserModel($id)
{
	$this->db->where('user_id', $id);
	$this->db->delete('users');
	return $id;
}


//Save Register Data In DB
function updateUser($id,$formarray)
{
	$this->db->where('user_id', $id);
	$this->db->update('users', $formarray);
	return $id;
}
//Save Register Data In DB
function changePassword($id,$new_pass)
{
	$this->db->where('user_id', $id);
	$this->db->update('users', $new_pass);
	return true;
}
}

//Save Register Data In DB
function accontSuspend($data_array)
{
	$this->db->insert("users",$data_array);
}

// Check Password

function verifyPassword($id)
{
	$this->db->where('user_id',$id);
		$row=$this->db->get("users")->row_array();
		return $row;

}
?>
