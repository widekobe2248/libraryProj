<?php
    include('conn.php');

    $sql_member_table = "CREATE TABLE IF NOT EXISTS members(
        card_num INT(6) PRIMARY KEY,
        username varchar(50) NOT NULL,
        password varchar(50) NOT NULL,
        name varchar(50) NOT NULL,
        telephone varchar(15) NOT NULL,
        address varchar(50) NOT NULL
        )";

    $sql_staff_table = "CREATE TABLE IF NOT EXISTS staff(
        staff_id  INT(6) AUTO_INCREMENT PRIMARY KEY,
        card_num INT(6) NOT NULL,
        FOREIGN KEY (card_num) REFERENCES members(card_num),
        manager BOOLEAN
        )";

    $sql_book_table = "CREATE TABLE IF NOT EXISTS books(
        isbn  INT(8) PRIMARY KEY,
        title  varchar(50) NOT NULL, 
        author  varchar(20) NOT NULL,
        num_copies  int(3) NOT NULL,
        loan_len  int(3) NOT NULL
        )";

    $sql_reservations_table= "CREATE TABLE IF NOT EXISTS reservations(
        res_id  INT(6) AUTO_INCREMENT PRIMARY KEY NOT NULL,
        expired_date  DATE NOT NULL,
        isbn INT(8) NOT NULL,
        card_num INT(6) NOT NULL,
        FOREIGN KEY (isbn) REFERENCES books(isbn),
        FOREIGN KEY (card_num) REFERENCES members(card_num)
    )";


    if(mysqli_query($conn, $sql_member_table)) {
        echo "<br>";
        echo "Member Table Created Successfully";
        echo "<br>";
    }
    else {
        echo "Error creating Member table";
        echo "<br>";
    }


    if(mysqli_query($conn, $sql_staff_table)) {
        echo "<br>";
        echo "Staff Table Created Successfully";
        echo "<br>";
    }
    else {
        echo "Error creating Staff table";
        echo "<br>";
    }


    if(mysqli_query($conn, $sql_book_table)) {
        echo "<br>";
        echo "Book Table Created Successfully";
        echo "<br>";
    }
    else {
        echo "Error creating book table";
        echo "<br>";
    }

    if(mysqli_query($conn, $sql_reservations_table)) {
        echo "<br>";
        echo "Reservations Table Created Successfully";
        echo "<br>";
    }
    else {
        echo "Error creating Reservations table";
        echo "<br>";
    }
    
    mysqli_close($conn);
?>