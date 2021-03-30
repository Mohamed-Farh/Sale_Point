<?php

include_once "Operations.php";
include_once "Database.php";
class Advertising extends Database implements Operations
{
        
    
    public function Add(){

    }
    public function Update(){

    }
    public function Delete(){}

    public function GetAll(){
        return parent::GetData("SELECT * FROM `advertising` where enddate > CURDATE()");
    }
  
}

?>