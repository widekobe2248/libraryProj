<?php
  //Starts session
  session_start();
  include("conn.php");




  if (isset($_POST['uname']))
  {

  

  //Gathers the form results
  $username = $_POST['uname'];
  $password = $_POST['password'];

  //SQL for searching for valid username
  $login_sql = "SELECT * FROM members WHERE username ='" .$username . "' ";

  //Gets result of the query
  $result = mysqli_query($conn, $login_sql);

  //Checks if query had results if not return an alert and not run the rest of the code
  if(mysqli_num_rows($result) == 0) {
    echo ' <script type="text/Javascript">
      alert("Username not found");
      </script> ';
  }
  else {
    //Grabs the row and gets the variables of the query
    $row = mysqli_fetch_assoc($result);
    $query_user = $row["username"];
    $query_pass = $row["password"];
    $query_cardnum = $row['card_num'];
    $name = $row['name'];

    //Compares form password and sets if it is equal to server saved password for that username
    if($password == $query_pass) {
      //Searches the staff table with the successful cardnum from the login
      $staff_sql = "SELECT * FROM staff WHERE card_num ='" .$query_cardnum . "' ";
      //Grabs the result 
      $staff_result = mysqli_query($conn, $staff_sql);
      //Logged in successfully so set the username session var
      $_SESSION['username'] = $query_user;
      $_SESSION['name'] = $name;
      //Checks if staff returned any rows
      if(mysqli_num_rows($staff_result) != 0){
        $row = mysqli_fetch_assoc($staff_result);
        //If so set the staff session to true and the manager to the corresponding value from the table
        $_SESSION['staff'] = 1;
        $_SESSION['manager'] = $row['manager'];
        header("Location: home.php");
      }
      else{
        header("Location: home.php");
      }
    }
    else {
      echo ' <script type="text/Javascript">
      alert("Incorrect Password");
      </script> ';
    }


  }

}
  ?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <a href="home.php" class="logo"><img src="carn.png" height="100"></a>
  <div class="header-right">
  <?php
      if(isset($_SESSION['username'])) {
        echo'<a class="home.php" href="#home">Home</a>
        <a href="account.php">My Account</a>
        <a href="search.php">Search</a> ';
      }
      else {
        echo'<a href ="login.php">Log In</a>';
      }
    ?>
    <?php
      if(isset($_SESSION['staff']))
      {
        echo '<a href="staff.php">Staff</a>';
      }
      if(isset($_SESSION['manager']))
      {
        if($_SESSION['manager'] == 1) {
          echo '<a href="manager.php">Manager</a>';
        }
      }
    ?>
  </div>
</div>



<div style="text-align:center;">
<form action="login.php" method="post">

  <h2>LOGIN</h2>

  <?php if (isset($_GET['error'])) { ?>

      <p class="error"><?php echo $_GET['error']; ?></p>

  <?php } ?>

  <label>User Name</label>

  <input type="text" name="uname" placeholder="User Name"><br>

  <label>Password</label>

  <input type="password" name="password" placeholder="Password"><br> 

  <button type="submit">Login</button>

</form>
</div>
</body>

</html>
