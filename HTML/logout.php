<?php
    //Starts session
    session_start();
    include("conn.php");

    session_destroy();
    header("Location: login.php");

?>