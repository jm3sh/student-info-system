<?php
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "student_db";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //executes if the connection has failed.
    if ($conn == false){
        die("Connection failed: ". mysqli_connect_error());
    } 
?>
