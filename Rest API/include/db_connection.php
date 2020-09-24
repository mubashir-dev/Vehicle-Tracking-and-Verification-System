<?php
class db_connection
{
    private $con;

    function connect()
    {
        include_once dirname(__FILE__) . '/constants.php';
         $this->con = new mysqli(db_host,db_user,db_pass,db_db_name);
         if(mysqli_connect_errno())
         {
             echo"Connection Lost".mysqli_connect_errno();
         }
         else
         {
            return $this->con;
            

         }
        
    }
}