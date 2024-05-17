<?php
    // Database credentials
    $servername = "localhost";
    $username = "id22177543_jm3sh";
    $password = "StudentsInfo_System111!"; 
    $dbname = "id22177543_jtastudents";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //executes if the connection has failed.
    if ($conn == false){
        die("Connection failed: ". mysqli_connect_error());
    } 
?>
