<!DOCTYPE html>

<head>
    <title>Stock List</title>
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
                header("location:login.php?msg=Please Login");
            }
            $username=$_SESSION['username'];
            
    ?>

    <div style="padding-top: 7px;"></div>
    <div class="top">
        <a href="dashboard.php">Dashboard</a>
        <a href="addstock.php">Add Stock</a>
        <a class="active" href="viewstock.php">View and Manage Stock</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="teal lighten-2">
        <h6 style="padding-top: 7px;color:black;" class="center large">Welcome <?php echo $username;?> !!! you are logged in !!</h6>
        <div id="chart" class="card-panel lighten-2 z-depth-1" style="background: #333;color: white;">
            <table>
            <tr class="row">
            <td class="col s6">
                <form class="form-inline my-2 my-lg-0" action="searchbyname.php">
                <table>
                <tr class="row">
                <td class="col s1">
                <i class="material-icons white">search</i>
                </td>
                <td class="col s9">
                    <input style="color: white;" class="form-control mr-sm-1" type="search" placeholder="Search by names" aria-label="Search" name="name" >
                </td> 
                <td class="col s2">   
                    <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="search">
                </td>
                </tr>
                </table>
            </form>
            </td>
            <td class="col s6">
                <form class="form-inline my-2 my-lg-0" action="searchbycat.php">
                <table>
                <tr class="row">
                <td class="col s1">
                <i class="material-icons white">search</i>
                </td>
                <td class="col s9">
                    <input style="color: white;" class="form-control mr-sm-1" type="search" placeholder="Search by catagories" aria-label="Search" name="catagory" >
                </td> 
                <td class="col s2">   
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </td>
                </tr>
                </table>
            </form>
            </td>
            </tr>
            </table>
        </div>
    </div>





    <h3 class="center card-panel teal lighten-2" style="font-family: jazz let">stock list
        <?php
        if(isset($_GET['msg']))
            echo "<h5 class='center card-panel teal lighten-2' style='font-family: jazz let'>".$_GET['msg']."<h5>";
        ?>
        
    </h3>
    
    <?php
        
        try
                {
                    $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
                    //echo "Connection is established...<br/>";
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        if(!empty($username))
                        {
                            $query=$dbhandler->prepare("select * from stock where username=?");
                            $query->execute(array($username));
                            $count = $query->rowcount();
                            if($count > 0)
                            {
    
                            
    ?>
    <ul>
    <script>
        var flag=0;
    </script>
        <table class="centered striped bordered">
            <thead>
                <tr>
                    <th>Stock Id</th>
                    <th>Stock Name</th>
                    <th>Catagory</th>
                    <th>Prize</th>
                    <th>Current stock</th>
                    <th>Min required stock</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
                while($r=$query->fetch(PDO::FETCH_ASSOC))
                {
            ?>
                <script>
                    var flag=1;
                </script> 
                <tbody>
                    <tr>
                        <td><?php echo $r['id'];?></td>
                        <td><?php echo $r['name'];?></td>
                        <td><?php echo $r['catagory'];?></td>
                        <td><?php echo $r['prize'];?></td>
                        <td><?php echo $r['quantity'];?></td>
                        <td><?php echo $r['minstock'];?></td>
                        <td> <a class="btn btn-primary" href="updatestock.php?id=<?php echo $r['id'];?>&name=<?php echo $r['name'];?>&minstock=<?php echo $r['minstock'];?>&prize=<?php echo $r['prize'];?>&catagory=<?php echo $r['catagory'];?>&quantity=<?php echo $r['quantity'];?>&upd=1">Update</a></td>
                        <td><a class="btn red btn-danger" href="deletestock.php?id=<?php echo $r['id'];?>">Delete</a></td>
                    </tr>
                </tbody>
                <?php 
                        }
                            
                
                         
                        
                ?>
            <div>
                <h5 class="red center" id="errmsg" style="padding-bottom: 2px;padding-top: 2px;color:black;" class="center large"></h5>
            </div>
            <script>
                if(flag==0)
                {
                    document.getElementById("errmsg").innerHTML="There is no stocks registered."
                }
            </script>
        </table>
    </ul>
    <?php 
                            }
                            else
                            {
                            ?>
                            <div class="red">
                                <h5 style="padding-bottom: 2px;padding-top: 2px;color:black;" class="center large">There is no stock registered.</h5>
                            </div>
            
    <?php
    }
    }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        die();
    }   
    ?>
</body>