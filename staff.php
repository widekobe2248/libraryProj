<?php
  session_start();
  include("conn.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
table{
  width:15%;
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

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}



.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

</style>
</head>
<body>

  <div class="header">
    <a href="home.php" class="logo"><img src="carn.png" height="100"></a>
    <div class="header-right">
    <?php
      if(isset($_SESSION['username'])) {
        echo'<a class="home.php" href="home.php">Home</a>
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
  
  <div style="padding-left:20px">
    <h1>Manager</h1>
    <p>Welcome to the Carnegie public library</p>
    <p>blah blah</p>
  </div>
  
  
  <div style="text-align:center;">
    <button type="button" class="button button2" onclick="document.getElementById('checkoutbook').style.display='block'">Check out a book</button>
      <form method = "post">
        <table border="1" bgcolor="#03C04A" id="checkoutbook" style="display:none" class="center">
          <tr><th colspan="2">Member information</th></tr>
          <tr><td>Name</td><td><input type ="text" name="title1"/></td></tr>
          <tr><td>Card Number</td><td><input type ="text" name="author1"/></td></tr>
          <tr><td>Address</td><td><input type ="text" name="isbn1"/></td></tr>
          <tr><td>Phone Number</td><td><input type ="text" name="copies1"/></td></tr>
          <tr><th colspan="2">Book Information</th></tr>
          <tr><td>Title</td><td><input type ="text" name="title1"/></td></tr>
          <tr><td>Author</td><td><input type ="text" name="author1"/></td></tr>
          <tr><td>ISBN</td><td><input type ="text" name="isbn1"/></td></tr>
          <tr><td><input type="submit" name="submit" value = "Submit"/></td></tr>
        </table>
        </form> 
  
  <div style="text-align:center;">
    <button type="button" class="button button2" onclick="document.getElementById('returnbook').style.display='block'">Return a member's book</button>
      <form method = "post">
        <table border="1" bgcolor="#03C04A" id="returnbook" style="display:none" class="center">
          <tr><td>Name</td><td><input type ="text" name="title1"/></td></tr>
          <tr><td>Card Number</td><td><input type ="text" name="author1"/></td></tr>
          <tr><td>Address</td><td><input type ="text" name="isbn1"/></td></tr>
          <tr><td>Phone Number</td><td><input type ="text" name="copies1"/></td></tr>
          <tr><td><input type="submit" name="submit" value = "Submit"/></td></tr>
        </table>
        </form> 

  
  
  </body>
  </html>