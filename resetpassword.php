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
            if(isset($_GET['code']))
            {
                if($_GET['code']==$_SESSION['code'])
                {
                    $_SESSION['flag']='1';
                    header('location:newpassword.php');
                }
                else
                {
                    header('location:resetpassword.php?msg=Wrong Code');
                }
            }
        ?>
        <!--
        <form action="resetpassword.php">
            <input type="text" name="code" placeholder="Enter code here"/>
            <input type="submit" value="submit" />
        </form>-->
        <br>
        <div class="teal lighten-2 center"><a href="home.php" class="teal lighten-2" style="font-size: 40px;color: #000;"><b>Verify Code</b></a></div>
        <?php 
            if(isset($_GET['msg']))
            {
        ?>   
            <div style="font-size:25px;" class="teal lighten-2 center"> <?php echo $_GET['msg'] ?> </div>
	<?php
            }
        ?>
            <br><br>
        <div style="font-size:20px;text-align: center;color: darkblue">
            Verification code has been sent to <?php echo $_SESSION['email'];?>
        </div><br>
        <form action="resetpassword.php" class="container login-form" style="padding-left: 10%;padding-right: 10%;">
		

			<div class="row">
				<div class="input-field col s12">
					<i class="mdi-social-person-outline prefix"></i>
					<input class="validate" id="username" name="code" type="text" placeholder="Enter Verification Code" required>
					<label for="text" data-error="wrong" data-success="right" class="center-align"></label>
				</div>
			</div>
            
            
			<div class="row">
				<div class="center input-field col s12">
					<input style="width: 52em;" class="center btn teal lighten-2" type="submit" value="submit">
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
