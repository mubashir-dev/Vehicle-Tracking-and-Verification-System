<?php

class map_param
{
    private $con;

    function __construct()
    {
        require_once dirname(__FILE__). '/db_connection.php';

        $db = new db_connection();
        $this->con = $db->connect();
    }

    // Method to retrieve map parameters
    function bus_location($bus_id)
    {
        $dat = [];
        $query ="SELECT * FROM bus_location WHERE bus_id = {$bus_id} ORDER BY bus_location.date ASC"        ;

        $result = $this->con->query($query);
        while ($row = $result->fetch_assoc()){
           $data[] = $row;
        }

        return $data;
       
    }
}