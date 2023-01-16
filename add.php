<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

    if(filter_var(getenv('REQUEST_METHOD')) == "POST")
    {
        $time = strftime("%X"); //time
        $date = strftime("%B %d, %Y"); //date
        $decision = "no";
   
        $server = mysqli_connect("localhost", "root","") or die(mysql_error());      //Connect to server
        $database = mysqli_select_db($server, "first_db") or due("Cannot connect to database"); //Connect to database

        $details = mysqli_real_escape_string($server, filter_input(INPUT_POST, 'details'));

        if(isset($_POST['public']))
        {
            $decision = "yes";
        }

       mysqli_query($server, "INSERT INTO list(details, date_posted, time_posted, public)
                    VALUES ('$details','$date','$time','$decision')"); //SQL query
       header("location:home.php");
    }
    else
    {
       header("location:home.php"); //redirects back to home
    }
?>