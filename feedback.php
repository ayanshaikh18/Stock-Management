<html>

<head>
    <meta charset="utf-8">
    <title>Feedbacks</title>
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
            if(isset($_GET['message']))
            {
                try 
                {
                    $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
                    //echo "Connection is established...<br/>";
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $query=$dbhandler->prepare("insert into feedbacks (username,message) values (?,?)");
                    $query->execute(array($username,$_GET['message']));
                    header("location:feedback.php?msg=Feedback posted successfully");
                } 
                catch (PDOException $ex) 
                {
                    echo $e->getMessage();
                    die();
                }
                
            }
        ?>
    
    <div style="padding-top: 7px;"></div>
    <div class="top">
        <a href="dashboard.php">Dashboard</a>
        <a href="addstock.php">Add Stock</a>
        <a href="viewstock.php">View and Manage Stock</a>
        <a class="active" href="feedback.php">Feedback</a>
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
    <div class="row">

        <!--abc -->
        <div class="col s8">
            <?php 
                if(isset($_GET['msg']))
                {
                    ?>
            <p class="error"><h4> <?php echo "          ".$_GET['msg'];?> </h4></p>
            <?php
                }
            
            ?>
            <div class="row">
                <form style="padding-left: 10%;padding-top: 2%;" class="col s8" action="feedback.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea  id="textarea1" class="materialize-textarea" name="message" required></textarea>
                                <label for="textarea1">feedback</label>
                        </div>
                    </div>
                    <input class = "btn green" type="submit" value="submit">
                </form>
            </div>
            <!--
                replies
                
            -->
            <?php
                try
                {
                    $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
                    //echo "Connection is established...<br/>";
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        if(!empty($username))
                        {
                            $query=$dbhandler->prepare("select * from feedbacks where username=?");
                            $query->execute(array($username));
                            $count = $query->rowcount();
                            if($count > 0)
                            {
                            ?>
                                <table>
                                    <div class="teal lighten-2">
                                        <h6 style="padding-bottom: 7px;padding-top: 7px;color:black;" class="center large">Your feedback list.</h6>
                                    </div>
                        <?php 
                            while($r=$query->fetch(PDO::FETCH_ASSOC))
                            {
                        ?>
                        <div class = "col s10">
                            <div class = "card blue-grey lighten-4">
                                <div class = "card-content">
                                    <span class = "card-title"><h5><?php echo $r['message']?></h5></span>
                                    <p>Answer : <?php echo $r['reply']?><br></p>
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
                                    <h6 style="padding-bottom: 7px;padding-top: 7px;color:black;" class="center large">You haven't given any feedback to us.</h6>
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
