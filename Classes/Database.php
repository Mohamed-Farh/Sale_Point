<?php
    class Database
    {
        var $conn;
        function __construct()
        {
            $this->conn=mysqli_connect("mysql5044.site4now.net","a6e60d_salepoi","ABC@123456","db_a6e60d_salepoi");
        }
    //To Insert- Update - delete 
        function RunDML($statment)
        {
            if(!mysqli_query($this->conn,$statment))
                {
                    return  mysqli_error($this->conn);
                }
            else
                return "ok";
        }
    //to search select
      function GetData($select)
      {
        $result= mysqli_query($this->conn,$select);
        return $result;
      }
    }
?>