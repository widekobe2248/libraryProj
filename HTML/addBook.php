<?php
    //Starts session
    session_start();
    include("conn.php");

    $title = $_POST['title4'];
    $author = $_POST['author4'];
    $isbn = $_POST['isbn4'];
    $copies = $_POST['copies4'];
    $loanlen = $_POST['loanlen'];

    $addbookSQL = "INSERT INTO books(isbn, title, author, num_copies, loan_len) VALUES(' ".$isbn ." ', '".$title . "', '".$author . "', 
    '".$copies. "', '".$loanlen . "' );";

    $result = mysqli_query($conn, $addbookSQL);
    if($result) {
        header("Location: success.php");
    }
    else {
        header("Location: error.php");
    }

?>