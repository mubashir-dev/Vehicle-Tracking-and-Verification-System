<?php

class bus_timings
{
    private $con;

    function __construct()
    {
        require_once dirname(__FILE__). '/db_connection.php';

        $db = new db_connection();
        $this->con = $db->connect();
    }

    // Method to retrieve the data about bus_timings
    function get_bus_schedule($route_id)
    {
        $dat = [];
        $query = " SELECT *FROM bus_timings WHERE route_id = ".$route_id;
        $result = $this->con->query($query);
        while ($row = $result->fetch_assoc()){
           $data[] = $row;
        }

        return $data;
       
    }
    // bus token 
    function bus_token($route_id)
    {
        $dat = [];
        $query = " SELECT * FROM route WHERE route_id = ".$route_id;
        $result = $this->con->query($query);
        while ($row = $result->fetch_assoc()){
           $data[] = $row;
        }

        return $data;
     
    }

    // get driver profile
    function driver_profile($bus_id)
    {
        $dat = [];
        $query = " SELECT * FROM driver WHERE driver_id = ".$bus_id;
        $result = $this->con->query($query);
        while ($row = $result->fetch_assoc()){
           $data[] = $row;
        }

        return $data;
     
 
    }
}