<?php 
    include('conn.php');
    $card_num = $_POST['card_num'];

    
    $sql = "DELETE FROM books WHERE card_num=" . $card_num;

    if(mysqli_query($conn, $sql))
    {
        header("Location: success.php");
    }
    else
    {
        header("Location: error.php");
    }
?>