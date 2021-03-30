<?php 
    session_start();
    if(isset($_SESSION["id"]))
    include_once "HeaderAfter.php";
    else
    include_once "HeaderBefore.php";
?>

<div class="container m-3">
<div class="form">
<form method="post">
        <center>
             <h1 class="m-3">Forget Password</h1>
    <br/>
    <div class="form-group" style="width: 35%;padding: 20px;">
    <input type="text"  class="form-control" name="txtuser" placeholder="Email / Phone" required=" ">
                    
    <input type="submit" style="width: 65%;margin: 20px;" class="btn btn-success m-3"   value="Check Email / Phone" name="btncheck">

    <?php

    if(isset($_POST["btncheck"]))
    {
        include_once "classes/Customer.php";
        $cust=new Customer();
        $cust->setemail($_POST["txtuser"]);
        $cust->setphone($_POST["txtuser"]);
        $rs=$cust->GetByEmail();
        if($row=mysqli_fetch_assoc($rs))
        {
            //send email
            $name=$row["name"];
            $active=rand(11111,99999);
            $_SESSION["code"]=$active;
            $id=$row["userid"];
            $url="http://localhost:8080/SalePoint/Activation.php?name=".urlencode($name)."&id={$id}";
            $msg="Dear Mr/Miss : ".$name ."<br/> Your Activation Code is : ".$active."<br/> Click her to check your activation code : ".$url;

            require_once "src/PHPMailer.php";
                            require_once "src/Exception.php";
                            require_once "src/SMTP.php";
                            require_once "vendor/autoload.php";
                                
                                $mail = new  PHPMailer\PHPMailer\PHPMailer();
        
                                $mail->IsSMTP();
                                //$mail->SMTPDebug = 1;
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure = 'ssl';
                                $mail->Host = "smtp.gmail.com";
                                $mail->Port = 465; // or 587
                                $mail->IsHTML(true);
    
                                $mail->Username = "yourmobileapp2017@gmail.com";
                                $mail->Password = "ABC@123456a";
    
                                $mail->setFrom('yourmobileapp2017@gmail.com', 'Sale Point');
                              
                                $mail->addAddress($row["email"], "Sale Point");
                                $mail->Subject = 'Forget Password - Sale Point';
                                
                                $mail->Body = $msg;
                                
                                if(!$mail->send()) {
                                  //  echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                }
                                else{
                                    
                                    echo("<div class='alert alert-success'>Verfication Code has been sent , Check Your Email </div>");		 
                                }


        }
        else
        {
            echo "<div class='alert alert-danger'>Invaild Email / Phone !!! </div>";
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