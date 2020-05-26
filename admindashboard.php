<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
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
        header("location:adminlogin.php?msg=Please Login");
    }
    try
    {
        $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
        //echo "Connection is established...<br/>";
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query=$dbhandler->prepare("select * from users");
        $query->execute();
        $countusers = $query->rowcount();
        $query=$dbhandler->prepare("select * from stock");
        $query->execute();
        $countstock = $query->rowcount();
        $query=$dbhandler->prepare("select * from feedbacks");
        $query->execute();
        $countfeedback = $query->rowcount();
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        die();
    }
    ?>
    <div style="padding-top: 7px;"></div>
    <div class="top">
        <a  class="active" href="admindashboard.php">Dashboard</a>
        <a href="adminmanageuser.php">View and Manage end Users</a>
        <a href="managefeedback.php">Manage Feedback</a>
        <a href="adminlogout.php">Logout</a>
    </div>
    <?php if(isset($_GET['msg'])){ ?>
        <div>
            <h5 class="green center" style="padding-bottom: 2px;padding-top: 2px;color:black;" class="center large"><?php echo $_GET['msg']; ?>
        </div>
    <?php } ?>
    <br><br>
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
            <table>
                <div class = "col s3">
                    <div class = "card-panel blue-grey lighten-4">
                        <div class = "card-content">
                            <span class = "card-title"><h3><?php echo $countusers;?></h3><h5> Total Users </h5><button class = "btn waves-effect waves-light blue-grey">
                            <i class = "material-icons">update</i></button>  </h3></span>
                            
                        </div>
                    </div>
                </div>
                <div class = "col s3">
                    <div class = "card-panel red lighten-4">
                        <div class = "card-content">
                            <span class = "card-title"><h3><?php echo $countstock;?></h3><h5> Items in Stock </h5><button class = "btn waves-effect waves-light blue-grey">
                             <i class = "material-icons">add</i></button>  </h3></span>
                        </div>
                    </div>
                </div>
                <div class = "col s3">
                    <div class = "card-panel blue-grey lighten-4">
                        <div class = "card-content">
                            <span class = "card-title"><h3><?php echo $countfeedback;?></h3><h5> Feedbacks </h5><button class = "btn waves-effect waves-light blue-grey">
                            <i class = "material-icons">update</i></button>  </h3></span>
                            
                        </div>
                    </div>
                </div>
            </table>
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