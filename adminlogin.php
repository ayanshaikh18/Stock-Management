<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</head>
<body>
        <?php
            if(isset($_GET['username']) && isset($_GET['password']))
            {
                $username=$_GET['username'];
                $password=$_GET['password'];
                if($username=='ayan' && $password=='123456')
                {
                    session_start();
                    $_SESSION['username']=$username;
                    header('location:admindashboard.php');
                }
                else 
                {
                    header('location:adminlogin.php?msg=Invalid Credentials');
                }
            }
        ?>
	<br>
	<div class="teal lighten-2 center"><a href="/dashboard1/home/" class="teal lighten-2" style="font-size: 40px;color: #000;"><b>Admin Login panel</b></a></div>
	<?php 
            if(isset($_GET['msg']))
            {
        ?>   
            <div style="font-size:25px;" class="teal lighten-2 center"> <?php echo $_GET['msg'] ?> </div>
	<?php
            }
        ?>
	<br>
        <form action="adminlogin.php" class="container login-form" style="padding-left: 10%;padding-right: 10%;">
		<div class="row">
				<div class="input-field col s12">
					<i class="mdi-social-person-outline prefix"></i>
					<input class="validate" id="username" name="username" type="text" placeholder="Username" required>
					<label for="text" data-error="wrong" data-success="right" class="center-align"></label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<i class="mdi-action-lock-outline prefix"></i>
					<input id="user_pass" name="password" placeholder="Password" type="password">
					<label for="password"></label>
				</div>
			</div>
			<div class="row">
				<div class="center input-field col s12">
					<input style="width: 52em;" class="center btn teal lighten-2" type="submit" value="Login">
				</div>
			</div>
	</form>
	<div class="row container"  style="padding-left: 10%;padding-right: 10%;">
		<div class="input-field col s4 m4 l4">
                    <a class="btn blue margin medium-small" href="home.php">Back to Home !!!</a>
		</div>               
		<div class="input-field col s4 m4 l4">
			<a class="margin medium-small btn red" href="#">Forgot password??</a>
		</div>               
	</div>
</body>
</html>