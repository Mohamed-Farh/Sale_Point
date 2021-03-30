<?php

include_once "Operations.php";
include_once "Database.php";
class Department extends Database implements Operations
{
    var $dno;
    var $name;
    var $namear;
    var $details;
    var $detailsar;
    
    public function Add(){

    }
    public function Update(){

    }
    public function Delete(){}

    public function GetAll(){

        return parent::GetData("SELECT * FROM `department`");
    }
    public function GetBydno($dno){

        return parent::GetData("SELECT * FROM `department` where departmentno=$dno");
    }


}

?>