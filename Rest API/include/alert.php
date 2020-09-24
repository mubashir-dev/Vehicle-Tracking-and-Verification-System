<?php

class alert
{
    private $con;

    function __construct()
    {
        require_once dirname(__FILE__). '/db_connection.php';

        $db = new db_connection();
        $this->con = $db->connect();
    }

    // Method to retrieve map parameters
    function get_alerts()
    {
        $data = [];
        $query = "SELECT * FROM alerts ORDER BY alerts.date ASC";
        $result = $this->con->query($query);
        while ($row = $result->fetch_assoc()){
           $data[] = $row;
        }

        return $data;
       
    }
}