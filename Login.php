<?php
ob_start();
session_start();
include_once "HeaderBefore.php";
?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/xcode.min.css" />

	<link rel="stylesheet" href="dist/css/bootstrap-select-country.min.css" />
<div class="w3_login">

			<h3>Sign In & Sign Up</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form   method="post">

					<?php
						 if(isset($_COOKIE['usercookie'])){
							
							$_SESSION["id"]=$_COOKIE['usercookie'];
							echo("<script> window.open('index.php', '_self')</script>");		 
						 }
						if(isset($_POST["btnlogin"]))
						{
							include_once "Classes/Customer.php";
							$cust=new Customer();
							$cust->setphone($_POST["Username"]);
							$cust->setemail($_POST["Username"]);
							$cust->setpassword($_POST["Password"]);
							$rs=$cust->login();
							if($row=mysqli_fetch_assoc($rs))
							{
								$_SESSION["id"]=$row["userid"];
								$_SESSION["name"]=$row["name"];

								if(isset($_POST["chkloginme"]))
								{
									echo "ok";
									setcookie("usercookie",$_SESSION["id"],time()+60*60*24*365);
								}
								 echo("<script> window.open('index.php', '_self')</script>");		 
							}
							else{
								echo "<div class='alert alert-danger'>Invaild user / password, try again </div>";
							}
						}
					?>

					  <input type="text" name="Username" placeholder="Username" required=" ">
                      <input type="password" name="Password" placeholder="Password" required=" ">
                      <input type="checkbox" name="chkloginme" style="margin-bottom:15px;"/>
                      <span style="margin-left: 10px;"> Login Me</span>
              
					  <input type="submit"   value="Login" name="btnlogin">
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>					
					<form  method="post">
						<?php
						if(isset($_POST["btnreg"]))
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
					
							$msg=$cust->Add();
							if($msg=="ok")
							{
								echo "<div class='alert alert-success'>User has been created succeed </div>";
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

					  <input type="text" name="txtname" placeholder="Full name" required=" ">
					  <input type="password" name="txtpass" placeholder="Password" required=" ">
					  <input type="email" name="txtemail" placeholder="Email Address" required=" ">
                      <input type="text" name="txtphone" placeholder="Phone Number" required=" ">
                      <input type="date" class="form-control" name="txtbdate" style="margin-bottom:15px" placeholder="Birthdate" required=" ">
                      <input type="text" name="txtaddress" placeholder="Your Address" required=" ">

                      <select name="scountry" class="form-control"  style="margin-bottom:15px">
                          <option value="EG">Egypt</option>
                          <option value="KSA">KSA</option>
                          <option value="US">USA</option>
                      </select>
                      <input type="checkbox" name="chkagree" style="margin-bottom:15px" required/>  <span style="margin-left: 10px;"> I,m agree on all website <a href="terms.php"> Terms & Conditions</a></span>
					  <input type="submit" value="Register" name="btnreg">
					</form>
				  </div>
				  <div class="cta"><a href="Forgetpassword.php">Forgot your password?</a></div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>

	<script src="dist/js/bootstrap-select-country.min.js"></script>
<?php
include_once "Footer.php";
?>