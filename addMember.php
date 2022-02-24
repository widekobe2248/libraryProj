<?php
    //Starts session
    session_start();
    include("conn.php");

    $name = $_POST['name5'];
    $cardnum = $_POST['cardnumber5'];
    $addy = $_POST['address5'];
    $phone = $_POST['phonenumber5'];
    $username = $_POST['uname'];
    $password = $_POST['password'];

    $addmemberSQL = "INSERT INTO members(card_num, username, password, name, telephone, address) 
    VALUES(' ".$cardnum ." ', '".$username . "', '".$password . "', '".$name. "', '".$phone . "', '".$addy. "' );";

    $result = mysqli_query($conn, $addmemberSQL);
    if($result) {
        header("Location: success.php");
    }
    else {
        header("Location: error.php");
    }

?>