<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:adminlogin.php?msg=Please Login");
    }
    $username=$_GET['username'];
    $message=$_GET['message'];
    $reply=$_GET['reply'];
    try
    {
        $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
        //echo "Connection is established...<br/>";
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query=$dbhandler->prepare("UPDATE feedbacks set reply=? where username=? and message=?");
        $query->execute(array($reply,$username,$message));
        header("location:managefeedback.php?msg=Replied to the feedback Sucessfully");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        die();
    } 
?>