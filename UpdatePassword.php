<?php 
    session_start();
    if(isset($_SESSION["id"]))
    include_once "HeaderAfter.php";
    else
    include_once "HeaderBefore.php";

    if(!isset($_GET["id"])) 
      echo("<script> window.open('login.php', '_self')</script>"); 
?>

<div class="container m-3">
<div class="form">
<form method="post">
        <center>
             <h1 class="m-3">Create New Password - Forget Password</h1>
    <br/>
    <div class="form-group" style="width: 55%;padding: 20px;">
    <input type="text" style="margin: 20px;" value="<?php if(isset($_GET["id"])) echo $_GET["name"];  ?>" class="form-control" name="txtname" readonly required=" ">
    <input type="password" style="margin: 20px;"  class="form-control" name="txtpass" placeholder="New Password" required=" ">
    <input type="password"  style="margin: 20px;" class="form-control" name="txtcpass" placeholder="Confirm Password" required=" ">
                    
    <input type="submit" style="width: 65%;margin: 20px;" class="btn btn-success m-3"   value="Reset Password" name="btnupdate">

    <?php
        if(isset($_POST["btnupdate"]))
        {
            if($_POST["txtpass"]==$_POST["txtcpass"])
            {
                include_once "classes/Customer.php";
                $cust=new Customer();
                $cust->setpassword($_POST["txtpass"]);
               $cust->UpdatePW();
                echo "<div class='alert alert-success'>Password has been updated !!! <a href='login.php'> Login ... </a> </div>";
                
            }
            else

            {
                echo "<div class='alert alert-danger'>Password is not match !!! </div>";
            }
        }

    ?>
    </div>
</center>
</form>
</div>

</div>

<?php  
    include_once "Footer.php";
?>