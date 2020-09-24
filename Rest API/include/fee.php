<?php

class fee
{
    private $con;

    function __construct()
    {
        require_once dirname(__FILE__). '/db_connection.php';

        $db = new db_connection();
        $this->con = $db->connect();
    }

    // Method to retrieve map parameters
    function fee_status_STUDENT($id)
    {
        $data = [];
        $id = 1;
        $query = "SELECT * FROM fee WHERE student_id = ".$id;
        $result = $this->con->query($query);
        while ($row = $result->fetch_assoc()){
           $data[] = $row;
        }
        return $data;
       
    }

        // Method to retrieve map parameters
        function fee_status_FACULTY($id)
        {
            $data = [];
            $query = "SELECT * FROM faculty_fee WHERE faculty_id = ".$id;
            $result = $this->con->query($query);
            while ($row = $result->fetch_assoc()){
               $data[] = $row;
            }
            return $data;
           
        }



}