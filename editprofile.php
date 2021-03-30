<?php 
    session_start();
    if(isset($_SESSION["id"]))
    include_once "HeaderAfter.php";
    else
    include_once "HeaderBefore.php";
?>

<div class="container m-3">
 
<div class="form">
<form method="post" enctype="multipart/form-data">
<center>
    <h1 class="m-3">My Profile Page</h1>
    <br/>
                
<table class="table table-striped table-borderd m-3" style="width:70%">

<tr>
<td colspan="2">
<?php
						if(isset($_POST["btnupdate"]))
						{
							include_once "Classes/Customer.php";
							$cust=new Customer();
							$cust->setname($_POST["txtname"]);
							$cust->setphone($_POST["txtphone"]);
							$cust->setemail($_POST["txtemail"]);
							$cust->setaddress($_POST["txtaddress"]);
							$cust->setpassword($_POST["txtpass"]);
							$cust->setcountry($_POST["scountry"]);
							$cust->setbdate($_POST["txtbdate"]);
							$reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
							if(preg_match($reg,$_POST["txtpass"]))
							{
					
							$msg=$cust->Update();
							if($msg=="ok")
							{
                            $dir="Customer/";
                            $image=$_FILES['file']['name'];     
                            $temp_name=$_FILES['file']['tmp_name'];
                            
                            //$size = filesize($temp_name);
                            //echo($size);

                            $img=$_SESSION["id"];
                            if($image!="")
                            {
                                $fdir= $dir.$img.".jpg";
                                move_uploaded_file($temp_name, $fdir);
                            }
							echo "<div class='alert alert-success'>User has been updated succeed </div>";
							}
							else if(strpos($msg,"users.email"))
							{
								echo "<div class='alert alert-danger'>This email is used , try again </div>";
							}else if(strpos($msg,"users.phone"))
							{
								echo "<div class='alert alert-danger'>This phone is used , try again </div>";
							}
							else
								{
									echo $msg;
								}
							}
							else
							{
								echo "<div class='alert alert-warning'>Password is weak !!! </div>";
							}
						}	
						?>
</td>
</tr>

    <?php
        include_once "classes/Customer.php";
        $cust=new Customer();
        $rs=$cust->GetAll();
        if($row=mysqli_fetch_assoc($rs))
        {
    ?>
       
        <tr>
            <td>Full Name  </td>
            <td><input type="text" class="form-control" name="txtname" placeholder="Full name" value="<?php echo $row["name"]; ?>" required=" ">  </td>
        </tr>
        <tr>
            <td>Email  </td>
            <td>  <input type="email" class="form-control"  name="txtemail" value="<?php echo $row["email"]; ?>" placeholder="Email Address" required=" "/> </td>
        </tr>
        <tr>
            <td>Phone </td>
            <td>  <input type="text" class="form-control"  name="txtphone" value="<?php echo $row["phone"]; ?> " placeholder="Phone Number" required=" "></td>
        </tr>
       
        <tr>
            <td>Password </td>
            <td>  <input type="password" class="form-control"  name="txtpass" value="<?php echo $row["password"]; ?>" placeholder="Password" required=" "> </td>
        </tr>
        <tr>
            <td>Address  </td>
            <td><input type="text" class="form-control"  name="txtaddress" value="<?php echo $row["address"]; ?>" placeholder="Your Address" required=" ">  </td>
        </tr>
        <tr>
            <td>Birthdate  </td>
            <td> <input type="date" class="form-control"  value="<?php echo $row["bdate"]; ?>" name="txtbdate" style="margin-bottom:15px" placeholder="Birthdate" required=" "> </td>
        </tr>
        <tr>
            <td>Country </td>
            <td><select name="scountry" class="form-control"  style="margin-bottom:15px">
    
                <option value="EG" <?php if($row["country"]=="EG") echo "selected";  ?> >Egypt</option>
                <option value="KSA"  <?php if($row["country"]=="KSA") echo "selected";  ?>>KSA</option>
                <option value="USA"  <?php if($row["country"]=="USA") echo "selected";  ?>>USA</option>
                
            </select>
             
        </tr>
        <tr>
            <td>Image Profile </td>
            <td> <input type="file" class="form-control"  name="file"  style="margin-bottom:15px" /> </td>
        </tr>
        <tr style="text-align: center;">
            <td> <input type="submit" name="btnupdate" class="btn btn-warning" value="Update Profile"/>  </td>
            <td> <input type="submit" class="btn btn-danger" value="Delete Account"/>  </td>
        </tr>

        <?php } ?>
    </table>        
    </center>
 </div>
 </form>
</div>

<?php  
    include_once "Footer.php";
?>