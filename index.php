<html>
    <head>
	<title>Hello World</title>
    </head>
    <body>
	<?php
	echo "I am php";
        //echo "<script>console.log('". $id_exists ."'); </script>";
	?>
        <br>
        <a href="login.php"> Click here to login 
        <a href="register.php"> Click here to register 
    </body>
    <br/>
    <h2 align=""center">List</h2>
    <table width="100%" border="1px">
        <tr>
            <th>Id</th>
            <th>Details</th>
            <th>Post Time</th>
            <th>Edit Time</th>
        </tr>
        <?php
            $server = mysqli_connect("localhost", "root","") or die(mysql_error());      //Connect to server
            $database = mysqli_select_db($server, "first_db") or due("Cannot connect to database"); //Connect to database
            $query = mysqli_query($server, "Select * from list where public='yes'");    //SQL Query
            while($row = mysqli_fetch_array($query)) 
            {
                Print "<tr>";
                    Print '<td align="center">'. $row['id'] . "</td>";
                    Print '<td align="center">'. $row['details'] . "</td>";
                    Print '<td align="center">'. $row['date_posted'] ." - " . $row['time_posted'] . "</td>";
                    Print '<td align="center">'. $row['date_edited'] ." - " . $row['time_edited'] ."</td>";
                Print "</tr>";
            }
        ?>
    </table>
</html>

         
