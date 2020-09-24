<?php

class Login
{
	private $con;

	function __construct()
	{
		require_once dirname(__FILE__) . '/db_connection.php';

		$db = new db_connection();
		$this->con = $db->connect();
	}

	// Method to retrieve map parameters
	function Auth_Student($data_user)
	{
		$reg_no = $data_user["reg_no"];
		$password = $data_user["password"];
		$role = $data_user['role'];
		$query = "SELECT * FROM student WHERE  reg_no = '$reg_no' AND password = '$password'";
		$result = $this->con->query($query);
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}


	// Method to retrieve map parameters
	function Auth_Faculty($data_user)
	{
		$reg_no = $data_user["reg_no"];
		$password = $data_user["password"];
		$query = "SELECT * FROM faculty WHERE  faculty_no = '$reg_no' AND pass = '$password'";
		$result = $this->con->query($query);
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}
}
