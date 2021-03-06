<!DOCTYPE html>

<head>
    <title>Feedbacks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
    <script type = "text/javascript"
        src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>
    <style>

    body,
    h1 {
        font-family: "Raleway", sans-serif
    }
    
    body,
    html {
        height: 100%
    }
    
    .bgimg {
        min-height: 100%;
        background-position: center;
        background-size: cover;
    }
    
    .top {
        background-color: #333;
        overflow: hidden;
    }
    
    .top a {
        float: left;
        color: #ffffff;
        text-align: center;
        padding: 14px 16px;
        font-size: 17px;
    }
    
    .top a:hover {
        background-color: #ddd;
        color: black;
    }
    
    .top a.active {
        background-color: #A64564;
        color: white;
    }
    
    .pp {
        margin-top: 95px;
        font-size: 23px;
        text-align: center;
    }
    
    .ppp {
        margin-top: 30px;
        text-align: center;
        margin-bottom: 30px;
    }

    </style>
</head>

<body>
    <?php
        session_start();
        if(!isset($_SESSION['username']))
        {
          header("location:adminlogin.php?msg=Please Login");
        }
    ?>

    <div style="padding-top: 7px;"></div>
    <div class="top">
        <a href="admindashboard.php">Dashboard</a>
        <a href="adminmanageuser.php">View and Manage end Users</a>
        <a class="active" href="managefeedback.php">Manage Feedback</a>
        <a href="adminlogout.php">Logout</a>
    </div>
    
    <?php if(isset($_GET['msg'])) { ?>
        <div>
            <h5 class="green center" style="padding-bottom: 2px;padding-top: 2px;color:black;" class="center large"><?php echo $_GET['msg']; ?></h5>
        </div>
    <?php } ?>


    <h3 class="center card-panel teal lighten-2" style="font-family: jazz let">End user's feedback list</h3>
    
    <?php
    
        try
        {
            $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
            //echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $query=$dbhandler->prepare("select * from feedbacks");
            $query->execute();
            $count = $query->rowcount();
            if($count!=0)
            {
        
    ?>
    <ul>
        <table class="centered striped bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Feedback</th>
                    <th>Answer</th>
                    <th>Submit</th>
                </tr>
            </thead>
            <script>
                var g=0;
            </script>
            <?php 
                while($r=$query->fetch(PDO::FETCH_ASSOC))
                {
            ?>
                <script>
                    var g=1;
                </script>
                <form action="answerfeedback.php">
                <tbody>
                    <tr>
                        <td><?php echo $r['username'];?><input type="hidden" name="username" value="<?php echo $r['username'];?>"></td>
                        <td><?php echo $r['message'];?><input type="hidden" name="message" value="<?php echo $r['message'];?>"></td>
                        <td>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="stock_empty" type="text" name="reply" required placeholder="Answer here">
                                    <label for="stock_empty">Answer</label>
                                </div>
                            </div>
                        </td>                        
                        <td><input type="submit" class="btn green btn-danger" value="Answer"></td>
                    </tr>
                </tbody>
                </form>
                <?php 
                } 
                ?>
            <div>
                <h5 class="green center" id="errmsg" style="padding-bottom: 2px;padding-top: 2px;color:black;" class="center large"></h5>
            </div>
            <script>
                if(g==0)
                {
                    document.getElementById('errmsg').innerHTML="There are no pending feedbacks which to be answered.";
                }
            </script>
        </table>
    </ul>
    
    <?php 
            }
            else 
            {
            
    ?>
                <div class="green">
                    <h5 style="padding-bottom: 2px;padding-top: 2px;color:black;" class="center large">There is no pending feedback to be replied.</h5>
                </div>
    
            <?php 
            
            }
        }
        catch (PDOExceptionException $ex) 
        {
            echo $ex->getMessage();
            die();
        }
            ?>
</body>