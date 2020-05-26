<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php?msg=Please Login");
    }
    $username=$_SESSION['username'];
    if(isset($_GET['id']))
    {
        $username=$_SESSION['username'];
        $id=$_GET['id'];
        try
        {
            $dbhandler = new PDO('mysql:host=localhost;dbname=dm_project','root','');
            //echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $query=$dbhandler->prepare("delete from stock where id=? and username=?");
            $query->execute(array($id,$username));
            header("location:viewstock.php?msg=Item Deleted Sucessfully");
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        } 
    }
?>