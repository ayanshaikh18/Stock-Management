<html>

<head>
    <meta charset="utf-8">
    <title>Student Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>

</head>
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
        <a class="active" href="dashboard.php">Dashboard</a>
        <a href="addstock.php">Add Stock</a>
        <a href="viewstock.php">View and Manage Stock</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="teal lighten-2">
        <h6 style="padding-top: 7px;color:black;" class="center large">Welcome <?php 
                echo $_SESSION['username']; ?> !!! you are logged in !!</h6>
        <?php 
            if(isset($_GET['msg']))
            {
        ?>
            <h6 style="padding-top: 7px;color:black;" class="center large"><?php echo $_GET['msg']; ?></h6>
        <?php
            }
        ?>
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
    <div class="row">

        <div class="col s4 " style="height: 95%;background: #333;">
            
            <div class="card center" style="height: 50%; padding-top: 35px; margin-left: 35px; margin-right: 35px; margin-top: 10%;">
                <i class="indio-text text-lighten-1 large material-icons" style="padding-top: 5px">assignment</i>
                <!--Card image-->
                <div class="view overlay">
                    <h1 id="day"></h1>
                </div>
                <!--Card image-->

                <!--Card content-->
                <div class="card-body text-center">
                   
                    <h4>
                        <strong>
                    <p class="dark-grey-text" id="date">
                      
                    </p>
                  </strong>
                    </h4>

                </div>
                <!--Card content-->

            </div>
            <p style="color: white;margin-top: 10%;" class=' container center Trebuchet condenced'>
            God lets you be successful because he trusts you that you will do the right thing with it. Now, does he get disappointed often? All the time, because people get there and they forget how they got it.
            </p><p style="color: white;" class='container center Trebuchet condenced'><b>Steve Harvey</b></p>
        </div>
        <div class="col s8">
     
            
            <?php 
                if(isset($_GET['name']))
                {
                    $username=$_SESSION['username'];
                    $name=$_GET['name'];
                    try
                    {
                        $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
                        //echo "Connection is established...<br/>";
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                            
                                $query=$dbhandler->prepare("select * from stock where username=? and name=?");
                                $query->execute(array($username,$name));
                                $count = $query->rowcount();
                                if($count > 0)
                                {
                                ?>
                    <table>
                        <div class="teal lighten-2">
                            <h6 style="padding-bottom: 7px;padding-top: 7px;color:black;" class="center large">Your search list.</h6>
                        </div>
        
                        <?php
                            while($r=$query->fetch(PDO::FETCH_ASSOC))
                            {
                            ?>
                <div class = "col s3">
                    <div class = "card-panel blue-grey lighten-4">
                        <div class = "card-content">
                            <span class = "card-title"><h3><?php echo $r['id'];?></h3><h5> <?php echo $r['name'];?> </h5><button class = "btn waves-effect waves-light blue-grey">
                            <i class = "material-icons">update</i></button>  </h3></span>
                            <p>Catagory : <?php echo $r['catagory'];?><br>Prize : <?php echo $r['prize'];?><br>Quantity : <?php echo $r['quantity'];?><br>Barrier quantity : <?php echo $r['minstock'];?></p>
                        </div>
                    </div>
                </div>
                        <?php 
                            }
                         ?>
    </table>
            <?php
                }
                else
                {
                ?>
                    <div class="red">
                        <h6 style="padding-bottom: 7px;padding-top: 7px;color:black;" class="center large">There is no stock registered of name <?php echo $name?>.</h6>
                    </div>
            <div class="center"><a href="addstock.php" class = "btn waves-effect waves-light green center" ><i class = "material-icons">add</i>Add stock</a></div>
                <?php
                }
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                    die();
                }  
                }
            ?>
            
        </div>
    </div>
    <script>
        
        var date = new Date();
            var d = date.getDay();
            yr = date.getFullYear();
            mon = date.getMonth() + 1;
            dt = date.getDate();
            var str = "d";
            if (d == 0)
                str = "Sunday";
            if (d == 1)
                str = "Monday";
            if (d == 2)
                str = "Tuesday";
            if (d == 3)
                str = "Wednesday";
            if (d == 4)
                str = "Thursday";
            if (d == 5)
                str = "Friday";
            if (d == 6)
                str = "Saturday";
            var s=["JAN","FEB","MARCH","APRIL","MAY","JUNE","JULY","SEPT","OCT","NOV","DEC"];
            document.getElementById("date").innerHTML = "It's" + str;
            document.getElementById("day").innerHTML =  dt + " " + s[mon-1];
    </script>
</body>

</html>