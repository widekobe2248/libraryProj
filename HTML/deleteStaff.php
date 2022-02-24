<?php 
    include('conn.php');
    $staff_id = $_POST['staff_id'];

    
    $sql = "DELETE FROM staff WHERE staff_id=" . $staff_id;

    if(mysqli_query($conn, $sql))
    {
        header("Location: success.php");
    }
    else
    {
        header("Location: error.php");
    }
?>