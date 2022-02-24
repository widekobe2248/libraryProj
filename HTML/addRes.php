<?php
    //Starts session
    session_start();
    include("conn.php");

    $card_num = $_POST['card_num'];
    $isbn = $_POST['isbn'];
    $date = $_POST['date'];

    $getBookCountSQL =  "SELECT * FROM books WHERE isbn =" . $isbn;
    $countResult = mysqli_query($conn, $getBookCountSQL);
    $test = mysqli_fetch_assoc($countResult);
    $copies = $test['num_copies'];

    $borrowLimit = 6;
    //Staff Status
    $getStaffSQL = "SELECT * FROM staff INNER JOIN members ON staff.card_num = members.card_num";
    $staffResult = mysqli_query($conn, $getStaffSQL);
    $statusTest = mysqli_fetch_assoc($staffResult);


    $memberCurrBorrowSQL = "SELECT COUNT(*) FROM members INNER JOIN reservations ON members.card_num = reservations.card_num";
    $CurrBorrowResult = mysqli_query($conn, $memberCurrBorrowSQL);
    $currBorrow = mysqli_num_rows($CurrBorrowResult);

    echo($copies);
    echo("\n");
    echo($currBorrow);
    echo("\n");
    echo($borrowLimit);
    echo("\n");
    //Check if Books are available and member can borrow more
    if($copies > 0 && $currBorrow < $borrowLimit)
    {
        $new_copies = $copies - 1;
        $removeOneBookSQL = "UPDATE books SET num_copies ='" . $new_copies . "'WHERE isbn ='" . $isbn . "'";
        $addresSQL = "INSERT INTO reservations(expired_date, isbn, card_num) VALUES(' ".$date ." ', '".$isbn . "', '".$card_num . "' );";

        $resultRes = mysqli_query($conn, $addresSQL);
        $resultBook = mysqli_query($conn, $removeOneBookSQL);

        if($resultRes && $resultBook) {
            header("Location: success.php");
        }
        else {
            header("Location: error.php");
        }

    }
    else {
        header("Location: error.php");
    }


?>