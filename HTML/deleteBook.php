<?php 
    include('conn.php');
    $isbn = $_POST['isbn'];

    
    $sql = "DELETE FROM books WHERE isbn=" . $isbn;

    if(mysqli_query($conn, $sql))
    {
        header("Location: success.php");
    }
    else
    {
        header("Location: error.php");
    }
?>