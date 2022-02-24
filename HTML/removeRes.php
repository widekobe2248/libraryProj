<?php 
    include('conn.php');
    $isbn = $_POST['isbn'];
    $card_num = $_POST['card_num'];

    $getBookCountSQL =  "SELECT * FROM books WHERE isbn =" . $isbn;
    $countResult = mysqli_query($conn, $getBookCountSQL);
    $test = mysqli_fetch_assoc($countResult);
    $copies = $test['num_copies'];

    $new_copies = $copies + 1;

    $sql = "DELETE FROM reservations WHERE isbn=" . $isbn . " AND card_num=" . $card_num;
    $addOneBookSQL = "UPDATE books SET num_copies ='" . $new_copies . "'WHERE isbn ='" . $isbn . "'";

    $resultRes = mysqli_query($conn, $sql);
    $resultBook = mysqli_query($conn, $addOneBookSQL);

    if($resultRes && $resultBook) {
        header("Location: success.php");
    }
    else {
        header("Location: error.php");
    }


?>