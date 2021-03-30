<?php 
ob_start();
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
             <h1 class="m-3">Activation Code - Forget Password</h1>
    <br/>
    <div class="form-group" style="width: 35%;padding: 20px;">
    <input type="text" style="margin: 20px;" value="<?php if(isset($_GET["id"])) echo $_GET["name"];  ?>" class="form-control" name="txtname" readonly required=" ">
   
    <input type="number" style="margin: 20px;" class="form-control" name="txtcode" placeholder="Activation Code" required=" ">
                    
    <input type="submit" style="width: 65%;margin: 20px;" class="btn btn-success m-3"   value="Check Activation Code" name="btncheck">


    <?php
        if(isset($_POST["btncheck"]))
        {
            if($_SESSION["code"]==$_POST["txtcode"])
            {
                $name=$_GET["name"];
                $id=$_GET["id"];
                header("Location:UpdatePassword.php?name=".urlencode($name)."&id={$id}"); 
            }
            else
            {
                echo "<div class='alert alert-danger'>Invaild in activation code , check your email !!! </div>";
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