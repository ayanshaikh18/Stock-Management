<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
	<title>Reset Password</title>
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
            if(!isset($_SESSION['flag']))
            {
                header('location:forgotpassword.php');
            }
            // put your code here
            if(isset($_GET['password']))
            {
                $password=$_GET['password'];
                $email=$_SESSION['email'];
                try
                {
                    $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
                    //echo "Connection is established...<br/>";
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $query=$dbhandler->prepare("UPDATE users set password=? where email=?");
                    $query->execute(array($password,$email));
                    session_destroy();
                    header("location:login.php?msg=Password Changed Sucessfully");
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                    die();
                }
            }
        ?>
        <br>
        <div class="teal lighten-2 center"><a href="home.php" class="teal lighten-2" style="font-size: 40px;color: #000;"><b>Reset Password</b></a></div>
        <?php 
            if(isset($_GET['msg']))
            {
        ?>   
            <div style="font-size:25px;" class="teal lighten-2 center"> <?php echo $_GET['msg'] ?> </div>
	<?php
            }
        ?>
        <br><br>
        <form action="newpassword.php" class="container login-form" style="padding-left: 10%;padding-right: 10%;" onsubmit="return checkpassword(this);">
		

			<div class="row">
				<div class="input-field col s12">
					<i class="mdi-action-lock-outline prefix"></i>
                                        <input id="user_pass" name="password" placeholder="Enter New Password" type="password" required>
					<label for="password"></label>
				</div>
			</div>
                        
                        <div class="row">
				<div class="input-field col s12">
					<i class="mdi-action-lock-outline prefix"></i>
                                        <input id="user_pass" name="rpassword" placeholder="Confirm New Password" type="password" required>
					<label for="password"></label>
				</div>
			</div>
            
			<div class="row">
				<div class="center input-field col s12">
					<input style="width: 52em;" class="center btn teal lighten-2" type="submit" value="Change Password">
				</div>
			</div>
	</form>
        <div class="row container"  style="padding-left: 10%;padding-right: 10%;">
		<div class="input-field col s4 m4 l4">
                    <a class="margin medium-small btn green" href="login.php">Back to login page</a>
		</div>
        </div>
    <script type="text/javascript" language="JavaScript">
        function checkpassword(theForm) 
        {
            if (theForm.password.value != theForm.rpassword.value)
            {
                alert('Those passwords don\'t match!');
                return false;
            } 
            else    
            {
                return true;
            }
        }
    </script>
    </body>
</html>