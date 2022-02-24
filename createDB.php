<?php

    $servername="localhost";
    $username="root";
    $password="";

    $conn = mysqli_connect($servername, $username, $password);

    $sql = "CREATE DATABASE library";
    if(mysqli_query($conn, $sql)) {
        echo "DB Create\n";
        echo "<br>";
    }
    else {
        echo "Error Creating DB or Already Exists\n";
        echo "<br>";
    }


    mysqli_close($conn);
?>