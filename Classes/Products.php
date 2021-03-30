<?php

include_once "Operations.php";
include_once "Database.php";
class Products extends Database implements Operations
{
        var $ProductNo;
        var $Name;
        var $NameAr;
        var $Details;
        var	$DetailsAr;
        var $Price;
        var $Discount;
        var $Country;
        var $Stock;
        var $DepartmentNo;
    
    public function Add(){

    }
    public function Update(){

    }
    public function Delete(){}

    public function GetAll(){

        return parent::GetData("SELECT * FROM `products`");
    }
    public function GetOffers(){

        return parent::GetData("SELECT * FROM `products` where discount > 0");
    }
    public function Getbyprono(){

        return parent::GetData("SELECT * FROM `products` where Productno ='".$_GET["prono"]."'");
    }
    public function GetByDepart($dno){

        return parent::GetData("SELECT * FROM `products` where departmentno = $dno");
    }
}

?>