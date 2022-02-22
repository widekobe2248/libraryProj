<?php
    //Starts session
    session_start();
    include("conn.php");

    $cardnum = $_POST['membercardnum'];
    $manager = $_POST['manager'];

    $searchMemberidSQL = "SELECT * FROM members WHERE card_num = '" .$cardnum . "' ";
    try {
        $result = mysqli_query($conn, $searchMemberidSQL);

    } catch(Exception $e) {
        header("Location: error.php");
    }

    if(mysqli_num_rows($result) == 0) {
        header("Location: error.php");
    }
    else {

    



    $addmemberSQL = "INSERT INTO staff(card_num, manager) 
    VALUES('".$cardnum . "', '".$manager . "' );";

    $result = mysqli_query($conn, $addmemberSQL);
    if($result) {
        header("Location: success.php");
    }
    else {
        header("Location: error.php");
    }
    }
?>