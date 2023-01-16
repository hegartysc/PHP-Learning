<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back</a><br/><br/>
        <form action="register.php" method="POST">
           Enter Username: <input type="text" 
           name="username" required="required" /> <br/>
           Enter password: <input type="password" 
           name="password" required="required" /> <br/>
           <input type="submit" value="Register"/>
        </form>
    </body>
</html>


<?php
//echo '<script>console.log("Welcome to ****!"); </script>';

if(filter_var(getenv('REQUEST_METHOD')) == "POST") {
    $bool = true;
   
    $server = mysqli_connect("localhost", "root","") or die(mysql_error());      //Connect to server
    $database = mysqli_select_db($server, "first_db") or due("Cannot connect to database"); //Connect to database
    $query = mysqli_query($server, "Select * from users"); //Query the users table
    
    $username = mysqli_real_escape_string($server, filter_input(INPUT_POST, 'username'));
    $password = mysqli_real_escape_string($server, filter_input(INPUT_POST, 'password'));
    echo "Username entered is: ". $username . "<br />";
    echo "Password entered is: ". $password;
    
    while($row = mysqli_fetch_array($query)) //display all rows from query
    {
        $table_users = $row['username']; // the first username row 
                                          // is passed on to $table_users, 
                                          // and so on until the query is finished
        if($username == $table_users)     // checks if there are any matching fields
        {
            $bool = false; // sets bool to false
            Print '<script>alert("Username has been taken!");</script>';     //Prompts the user
            Print '<script>window.location.assign("index.php");</script>';//redirects to 
                                                                             //register.php
        }
    }

    if($bool) // checks if bool is true
    {
        mysqli_query($server, "INSERT INTO users (username, password) 
                     VALUES ('$username', '$password')"); // inserts value into table users
        Print '<script>alert("Successfully Registered!");</script>';      // Prompts the user
        Print '<script>window.location.assign("index.php");</script>'; // redirects to 
                                                                          // register.php
    }
}
?>