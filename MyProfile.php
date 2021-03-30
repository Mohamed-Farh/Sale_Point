
<?php 
session_start();
if(isset($_SESSION["id"]))
include_once "HeaderAfter.php";
else
include_once "HeaderBefore.php";

  ?>
<form method="post">
    <div class="container m-3">
    <center>
    <h1 class="m-3">My Profile Page</h1>
    <br/>
    <table class="table table-striped table-borderd m-3" style="width:70%">
    <?php
        include_once "classes/Customer.php";
        $cust=new Customer();
        $rs=$cust->GetAll();
        if($row=mysqli_fetch_assoc($rs))
        {
    ?>
     <tr>
            <td colspan="2" style="text-align: center;">
                <img src="Customer/<?php echo $_SESSION["id"]; ?>.jpg" height="100px" width="100px"/>
            </td>
        </tr>
        <tr>
            <td>Full Name  </td>
            <td> <?php echo $row["name"]; ?> </td>
        </tr>
        <tr>
            <td>Email  </td>
            <td> <?php echo $row["email"]; ?> </td>
        </tr>
        <tr>
            <td>Phone </td>
            <td> <?php echo $row["phone"]; ?> </td>
        </tr>
        <tr>
            <td>Address  </td>
            <td> <?php echo $row["address"]; ?> </td>
        </tr>
        <tr>
            <td>Birthdate  </td>
            <td> <?php echo $row["bdate"]; ?> </td>
        </tr>
        <tr>
            <td>Country </td>
            <td> <?php echo $row["country"]; ?> </td>
        </tr>
        <tr style="text-align: center;">
            <td> <a href="editprofile.php" class="btn btn-warning">Update Profile</a>  </td>
            <td> <input type="submit" name="btndelete" class="btn btn-danger" value="Delete Account"/>  </td>
        </tr>

        <?php } ?>
<?php
if(isset($_POST["btndelete"]))
{
    include_once "Classes/Customer.php";
	$cust=new Customer();
    $msg=$cust->Delete();
	if($msg=="ok")
	{
        unlink("Customer/".$_SESSION['id'].".jpg");
        echo("<script> window.open('logout.php', '_self')</script>");		         
    }
}

?>


    </table>        
    </center>
 </div>
 
</form>
<?php  
include_once "Footer.php";

?>