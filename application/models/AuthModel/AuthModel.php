<?php
class AuthModel extends CI_Model
{
public function __construct()
{
	parent::__construct();
	
}



//Check User in DB

public function CheckUser($email)
{

$this->db->where('user_email',$email);
		$row=$this->db->get("users")->row_array();
		return $row;
}

//Authorize Method //

public function AuthorizeUser()
{
$user=$this->session->userdata('user');
if(!empty($user))
{
	return true;
}
else
{
	return false;
}
}

}
?>
