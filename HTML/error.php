<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}


table{
  width:14%;
  margin-left: auto;
  margin-right: auto;
}

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
    <a href="logout.php">Log Out</a>
    </div>
  </div>
<h1>I am sorry, please try again</h1>

<p> Welcome to the failure page.  If you made it here, you clearly did something wrong.<br> 
I would prefer if you didn't do that.  Thank you.</body>
<a href="home.php"><button>Main Menu</button></a>
<img src="thumbsdown.jpg" alt="Thumbs Down"
          width="200" 
     height="125"/>
</html>
