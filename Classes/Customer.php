<?php
 
include_once "Operations.php";
include_once "Database.php";
class Customer extends Database implements Operations
{
   var $custid;
   var $name;
   var $phone;
   var $email;
   var $address;
   var $password;
   var $country;
   var $bdate;

   public function getcustomerid(){
       return $this->custid;
   }
   public function setcustomerid($value){
       $this->custid=$value;
   }
   public function getname(){
    return $this->name;
    }
    public function setname($value){
        $this->name=$value;
    }
    public function getphone(){
        return $this->phone;
    }
    public function setphone($value){
        $this->phone=$value;
    }
    public function getemail(){
        return $this->email;
    }
    public function setemail($value){
        $this->email=$value;
    }
    public function getbdate(){
        return $this->bdate;
    }
    public function setbdate($value){
        $this->bdate=$value;
    }
    public function getpassword(){
        return $this->password;
    }
    public function setpassword($value){
        $this->password=$value;
    }
    public function getaddress(){
        return $this->address;
    }
    public function setaddress($value){
        $this->address=$value;
    }
    public function getcountry(){
        return $this->country;
    }
    public function setcountry($value){
        $this->country=$value;
    }



    public function login()
    {
        return parent::GetData("select * from users where (phone='".$this->getphone()."' or email ='".$this->getemail()."') and password='".$this->getpassword()."'");
    }
    public function Add(){
        return parent::RunDML("insert into users values(Default,'".$this->getname()."','".$this->getphone()."','".$this->getemail()."','".$this->getbdate()."','".$this->getaddress()."','".$this->getcountry()."','".$this->getpassword()."')");
    }
    public function Update(){
        return parent::RunDML("update users set name='".$this->getname()."',phone='".$this->getphone()."',email='".$this->getemail()."',bdate='".$this->getbdate()."',address='".$this->getaddress()."',country='".$this->getcountry()."',password='".$this->getpassword()."' where userid='".$_SESSION["id"]."'");
    }
    public function UpdatePW(){
        return parent::RunDML("update users set password='".$this->getpassword()."' where userid='".$_GET["id"]."'");
    }
    public function Delete(){
        return parent::RunDML("delete from users  where userid='".$_SESSION["id"]."'");
    }
    public function GetAll(){
        return parent::GetData("select * from users where userid='".$_SESSION["id"]."'");
    }
    public function GetByEmail(){
        return parent::GetData("select * from users where email='".$this->getemail()."' or phone='".$this->getphone()."'");
    }



}

?>