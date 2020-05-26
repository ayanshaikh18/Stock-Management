<!DOCTYPE html>

<head>
    <title>Manage Users</title>
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


    <div style="padding-top: 7px;"></div>
    <div class="top">
        <a href="admindashboard.php">Dashboard</a>
        <a class="active" href="adminmanageuser.php">View and Manage end Users</a>
        <a href="managefeedback.php">Manage Feedback</a>
        <a href="adminlogout.php">Logout</a>
    </div>
    




    <h3 class="center card-panel teal lighten-2" style="font-family: jazz let">End user list</h3>
    <?php
        session_start();
        if(!isset($_SESSION['username']))
        {
            header('location:adminlogin.php?msg=Please Login');
        }
        if(isset($_GET['msg'])){ ?>
        <div>
            <h5 class="green center" style="padding-bottom: 2px;padding-top: 2px;color:black;" class="center large"><?php echo $_GET['msg']; ?>
        </div>
        <?php } 
        try
        {
            $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
            //echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $query=$dbhandler->prepare("select * from users");
            $query->execute();
            $count = $query->rowcount();
            if($count!=0)
            {
                
            
        
    ?>
    <ul>
    <script>
        var flag=0;
    </script>
        <table class="centered striped bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <?php
                while($r=$query->fetch(PDO::FETCH_ASSOC))
                {
            ?> 
                <tbody>
                    <tr>
                        <td><?php echo $r['username'];?></td>
                        <td><?php echo $r['email'];?></td>
                        <td><?php echo $r['password'];?></td>
                        <!--<td> <a class="btn btn-primary" href="../updatestockinfo?stock_id={{stock.stock_id}}&stock_name={{stock.stock_name}}&stock_empty={{ stock.stock_empty }}&stock_prize={{stock.stock_prize}}&stock_cat={{ stock.stock_catagory }}&stock_quantity={{stock.stock_quantity}}">Update</a></td>-->
                        <td><a class="btn red btn-danger" href="deleteuser.php?username=<?php echo $r['username'];?>">Delete</a></td>
                    </tr>
                </tbody>
            <?php } ?>
            <div>
                <h5 class="red center" id="errmsg" style="padding-bottom: 2px;padding-top: 2px;color:black;" class="center large"></h5>
            </div>
        </table>
    </ul>
    
    <?php
            }
            else
            {
                ?>
                <div class="red">
                    <h5 style="padding-bottom: 2px;padding-top: 2px;color:black;" class="center large">There are no end user registered.</h5>
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