<?php
    session_start(); //starts the session
    if($_SESSION['user']){           //checks if user is logged in
    }
    else {
       header("location:index.php"); //redirects if user is not logged in.
    }

    if(filter_var(getenv('REQUEST_METHOD')) == "GET")
    {
        $server = mysqli_connect("localhost", "root","") or die(mysql_error());      //Connect to server
        $database = mysqli_select_db($server, "first_db") or due("Cannot connect to database"); //Connect to database
        $id = $_GET['id'];
        mysqli_query($server, "DELETE FROM list WHERE id='$id'");
        header("location:home.php");
    }
?>