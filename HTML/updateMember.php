<?php 
    include('conn.php');
    $card_num = $_POST['card_num'];
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];


    $sql = "UPDATE members SET telephone ='" .$telephone. "', name = '" . $name . "', address = '" . $address . "'
    WHERE card_num =" . $card_num . ";";

    if(mysqli_query($conn, $sql))
    {
        header("Location: success.php");
    }
    else
    {
        header("Location: error.php");
    }
?>