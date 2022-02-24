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
  <h1>Search</h1>
  <p>Welcome to the Carnegie public library</p>
  <p>blah blah</p>
</div>

<div style="text-align:center;">
  <h2> Search for your favorite book! </h2>
  <form method = "post">
    <table border="1" bgcolor="#03C04A" class="center">
      <tr><td>Title</td><td><input type ="text" name="title"/></td></tr>
      <tr><td>Author</td><td><input type ="text" name="author"/></td></tr>
      <tr><td>ISBN</td><td><input type ="text" name="isbn"/></td></tr>
      <tr><td><input type="submit" name="submit" value = "Submit"/></td></tr>
    </table>
    </form> 

    <?php
    

    @$a=$_POST['title'];
    @$b=$_POST['author'];
    @$c=$_POST['isbn'];
    @$d=$_POST['num_copies'];
    if(@$_POST['submit'])
    {
      $query = "SELECT * FROM books where title='$a' OR author='$b' OR isbn = '$c' OR num_copies = '$d'";

      $result = mysqli_query($conn,$query);
    

    if (mysqli_num_rows($result) > 0){
        echo "<br>";
        echo "<table class=search>";
        echo "<tr class=center>";
        echo "<td>Id</td>";
        echo "<td>Name</td>";
        echo "<td>Title</td>";
        echo "<td>Copies</td>";
        echo "</tr>"; 
      while($row = mysqli_fetch_assoc($result)) {                                              
          echo "<tr>";
          echo "<td>".$row['title']."</td>";
          echo "<td>".$row['author']."</td>";
          echo "<td>".$row['isbn']."</td>";
          echo "<td>".$row['num_copies']."</td>";
          echo "</tr>";
      }
    }
    else {
      echo "0 results";
    }
  }
  
?>
</div>

</body>
</html>