<?php 
    include('conn.php');
    $staff_id = $_POST['staff_id'];
    $manager = $_POST['manager'];
    echo($manager);
    if($manager == "yes")
    {
        $sql = "UPDATE staff SET manager =1 WHERE staff_id =" . $staff_id . ";";
        echo("MANAGER YES");
    }
    else {
        $sql = "UPDATE staff SET manager =0 WHERE staff_id =" . $staff_id . ";";
        echo("MANAGER NO");
    }

    if(mysqli_query($conn, $sql))
    {
        header("Location: success.php");
    }
    else
    {
        header("Location: error.php");
    }
    
?>