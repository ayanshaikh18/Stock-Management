<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</head>
<body>
        <?php
        if(isset($_GET['username']) && isset($_GET['password']) && isset($_GET['email']))
            {
                $username=$_GET['username'];
                $password=$_GET['password'];
                $email=$_GET['email'];
                try
                {
                    $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
                    //echo "Connection is established...<br/>";
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $query=$dbhandler->prepare("INSERT INTO users(username,password,email) VALUES (?,?,?) ");
                    $query->execute(array($username,$password,$email));
                    header("location:login.php?msg=Registered Sucessfully");
                }
                catch(PDOException $e)
                {
                    //echo $e->getMessage();
                    if($e->errorInfo[1]==1062)
                    {
                       ?>
                        <script>
                            alert('username already taken !');
                            window.location.href='registration.php';
                        </script>
                       <?php
                    }
                    die();
                }  
            }
            
                
        ?>
    
	<br>
        <div class="teal lighten-2 center"><a href="home.php" class="teal lighten-2" style="font-size: 40px;color: #000;"><b>Signup</b></a></div>
        
        <?php 
            if(isset($_GET['msg']))
            {
        ?>   
            <div style="font-size:25px;" class="teal lighten-2 center"> <?php echo $_GET['msg'] ?> </div>
	<?php
            }
        ?>
            <br>
        <div style="color: red;font-size: 15px;text-align: center">
            *Password must contain at least one number, one lowercase and one uppercase letter!<br>
            *Length of the password should be atleast 6
        </div>
	<form action="registration.php" onsubmit="return checkpassword(this);"  class="container login-form" style="padding-left: 10%;padding-right: 10%;">
		

			<div class="row">
				<div class="input-field col s12">
					<i class="mdi-social-person-outline prefix"></i>
					<input class="validate" id="username" type="text" name="username" placeholder="Username" required>
					<label for="text" data-error="wrong" data-success="right" class="center-align"></label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<i class="mdi-social-person-outline prefix"></i>
                                        <input id="Email" type="email" placeholder="Email" name="email">
					<label for="email"></label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<i class="mdi-action-lock-outline prefix"></i>
					<input id="user_pass" type="password" placeholder="Password" name="password">
					<label for="password"></label>
				</div>
			</div>
			<div class="row">
				<div class="center input-field col s12">
					<input style="width: 52em;" class="center btn teal lighten-2" type="submit" value="Register">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s4 m4 l4">
                                    <p class="margin medium-small"><a class="btn green" href="login.php">Already user??</a></p>
				</div>               
				<div class="input-field col s4 m4 l4">
					<p class="margin medium-small"><a class="btn blue" href="home.php">Back to Home </a></p>
				</div>               
				<div class="input-field col s4 m4 l4">
                                    <p class="margin medium-small"><a class="btn red" href="forgotpassword.php">Forgot password??</a></p>
				</div>               
			</div>
	</form>
        <script type="text/javascript" language="JavaScript">
            function checkpassword(form) 
            {
                re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/;
                if(!re.test(form.password.value)) 
                {
                    alert("Error: Username must contain at least one number, one lowercase and one uppercase letter!");
                    form.username.focus();
                    return false;
                }
                else    
                {
                    return true;
                }
            }
            function usernameTaken()
            {
                alert("Username is already taken");
            }
        </script>
</body>
</html>