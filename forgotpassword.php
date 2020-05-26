<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<style>
	.iris {
        background-image: url('images/new.jpg');
        background-repeat: no-repeat;
        height: 150vh;
        background-size: cover;
    }
</style>
</head>
    <body>
        <?php
            session_start();
            // put your code here
            if(isset($_GET['email']))
            {
                $email=$_GET['email'];
                try
                {
                    $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
                    //echo "Connection is established...<br/>";
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $query=$dbhandler->prepare("select * from users where email=?");
                    $query->execute(array($email));
                    $count = $query->rowcount();
                    if($count!=0)
                    {
                        $_SESSION['email']=$email;
                        require 'phpmailer/PHPMailerAutoload.php';
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                        $mail->Host="smtp.gmail.com";
                        $mail->Port=587;
                        $mail->SMTPAuth=true;
                        $mail->SMTPSecure='tls';
    
                        $mail->Username='mahammadayan18@gmail.com';
                        $mail->Password='ayan123456';
    
                        $mail->setFrom('mahammadayan18@gmail.com');
                        $mail->addAddress($email);
                        $mail->addReplyTo('mahammadayan18@gmail.com');
    
                        $mail->isHTML();
                        $mail->Subject="Resetting password";
                        function randomNumber($length) 
                        {
                            $result = '';
                            for($i = 0; $i < $length; $i++) 
                            {
                                $result .= mt_rand(0, 9);
                            }
                            return $result;
                        }
                        $code=  randomNumber(4);
                        $_SESSION['code']=$code;
                        $mail->Body="Hello,<br><h2>your verificaton code is $code</h2>. Use this code to reset your password";
                        if(!$mail->send())
                        {
                            echo "fail";
                        }
                        else
                        {
                            $_SESSION['flag']='1';
                            header('location:resetpassword.php');
                        }
                    }
                    else
                    {
                        session_start();
                        session_destroy();
                        header("location:forgotpassword.php?msg=Invalid Email");                    
                    }
                }
                catch(PDOException $e)
                {
                    
                    echo $e->getMessage();
                    die();
                }  
            }
            
        ?>
        
        <br>
        <div class="teal lighten-2 center"><a href="home.php" class="teal lighten-2" style="font-size: 40px;color: #000;"><b>Forgot Password</b></a></div>
        <?php 
            if(isset($_GET['msg']))
            {
        ?>   
            <div style="font-size:25px;" class="teal lighten-2 center"> <?php echo $_GET['msg'] ?> </div>
	<?php
            }
        ?>
        <br><br>
        <form action="forgotpassword.php" class="container login-form" style="padding-left: 10%;padding-right: 10%;">
		

			<div class="row">
				<div class="input-field col s12">
					<i class="mdi-social-person-outline prefix"></i>
					<input class="validate" id="username" name="email" type="text" placeholder="Email-id" required>
					<label for="text" data-error="wrong" data-success="right" class="center-align"></label>
				</div>
			</div>
            
			<div class="row">
				<div class="center input-field col s12">
					<input style="width: 52em;" class="center btn teal lighten-2" type="submit" value="Send Code">
				</div>
			</div>
	</form>
        <div class="row container"  style="padding-left: 10%;padding-right: 10%;">
		<div class="input-field col s4 m4 l4">
                    <a class="margin medium-small btn green" href="login.php">Back to login page</a>
		</div>
        </div>
    </body>
</html>
