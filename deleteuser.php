<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php?msg=Please Login");
    }
    $username=$_GET['username'];
    try
    {
        $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
        //echo "Connection is established...<br/>";
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query=$dbhandler->prepare("delete from users where username=?");
        $query->execute(array($username));
        header("location:adminmanageuser.php?msg=User Deleted Sucessfully");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        die();
    } 
?>