<?php 
    include('conn.php');
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $num_copies = $_POST['num_copies'];
    $loan_len = $_POST['loan_len'];

    $sql = "UPDATE books SET title ='" .$title. "', author = '" . $author . "', num_copies = '" . $num_copies . "', loan_len = '" . $loan_len . "'
    WHERE isbn =" . $isbn . ";";

    if(mysqli_query($conn, $sql))
    {
        header("Location: success.php");
    }
    else
    {
        header("Location: error.php");
    }
?>