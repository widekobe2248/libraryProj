<?php
  session_start();
  include("conn.php");
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
	function Home(){ window.location = "home.php"}
	function Account(){ window.location = "account.php"}
	function Search(){ window.location = "search.php"}
	function Staff(){ window.location = "Staff.php"}
	function Manager(){ window.location = "Manager.php"}
	function login(){ window.location = "login.php"}
</script>
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
  <a href="home.php" class="logo"><img src="carn.png"></a>
  <div class="header-right">
    <?php
      if(isset($_SESSION['username'])) {
        echo'<a class="home.php" href="#home">Home</a>
        <a href="account.php">My Account</a>
        <a href="search.html">Search</a> ';
      }
      else {
        echo'<a href ="login.php">Log In</a>';
      }
    ?>
    <?php
      if(isset($_SESSION['staff']))
      {
        echo '<a href="staff.html">Staff</a>';
      }
      if(isset($_SESSION['manager']))
      {
        if($_SESSION['manager'] == 1) {
          echo '<a href="manager.html">Manager</a>';
        }
      }
    ?>
    <a href="logout.php">Log Out</a>
  </div>
</div>

<div style="padding-left:20px">
  <h1>Home</h1>
  <p>Welcome to the Carnegie public library
  <?php 
  if (!empty($_SESSION['username']))
  {
    $name = $_SESSION['name'];
    echo $name . '</p>';
  }
  else {
    echo 'NEED TO LOGIN </p>';
  } 
  ?>

</div>

</body>
</html>

