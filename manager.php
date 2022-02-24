<!DOCTYPE html>
<?php
  session_start();
  include("conn.php");
?>
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
    <a class="home.php" href="home.php">Home</a>
    <a href="account.php">My Account</a>
    <a href="search.php">Search</a>
    <a href="staff.php">Staff</a>
    <a href="manager.php">Manager</a>
    <a href="logout.php">Log Out</a>
  </div>
</div>

<div style="padding-left:20px">
  <h1>Manager</h1>
  <p>Welcome to the Carnegie public library</p>
  <p>blah blah</p>
</div>


<div style="text-align:center;">
  <button type="button" class="button button2" onclick="document.getElementById('editbookdb').style.display='block'">Edit the book Database</button>
    <form method = "post">
      <table border="1" bgcolor="#03C04A" id="editbookdb" style="display:none" class="center">
        <tr><td>Title</td><td><input type ="text" name="title1"/></td></tr>
        <tr><td>Author</td><td><input type ="text" name="author1"/></td></tr>
        <tr><td>ISBN</td><td><input type ="text" name="isbn1"/></td></tr>
        <tr><td><input type="submit" name="submit" value = "Submit"/></td></tr>
      </table>
      </form> 
</div>
<?php
    

    @$a=$_POST['title1'];
    @$b=$_POST['author1'];
    @$c=$_POST['isbn1'];
    @$d=$_POST['num_copies1'];
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

<div style="text-align:center;">
  <button type="button" class="button button2" onclick="document.getElementById('editmemberdb').style.display='block'">Edit the member Database</button>
    <form method = "post">
        <table border="1" bgcolor="#03C04A" id="editmemberdb" style="display:none" class="center">
        <tr><td>Name</td><td><input type ="text" name="name2"/></td></tr>
        <tr><td>Card Number</td><td><input type ="text" name="cardnumber2"/></td></tr>
        <tr><td>Address</td><td><input type ="text" name="address2"/></td></tr>
        <tr><td>Phone Number</td><td><input type ="text" name="phonenumber2"/></td></tr>
        <tr><td><input type="submit" name="submit" value = "Submit"/></td></tr>
    </table>
    </form> 
    </div>

<div style="text-align:center;">
  <button type="button" class="button button2" onclick="document.getElementById('editstaffdb').style.display='block'">Edit the staff Database</button>
    <form method = "post">
        <table border="1" bgcolor="#03C04A" id="editstaffdb" style="display:none" class="center">
        <tr><td>Name</td><td><input type ="text" name="name3"/></td></tr>
        <tr><td>Position</td><td><input type ="text" name="position3"/></td></tr>
        <tr><td>Address</td><td><input type ="text" name="address3"/></td></tr>
        <tr><td>Phone Number</td><td><input type ="text" name="phonenumber3"/></td></tr>
        <tr><td><input type="submit" name="submit" value = "Submit"/></td></tr>
    </table>
    </form> 
    </div>     
<div style="text-align:center;">
  <button type="button" class="button button2" onclick="document.getElementById('addbook').style.display='block'">Add a Book</button>
    <form method = "post" action="addBook.php">
        <table border="1" bgcolor="#03C04A" id="addbook" style="display:none" class="center">
        <tr><td>Title</td><td><input type ="text" name="title4"/></td></tr>
        <tr><td>Author</td><td><input type ="text" name="author4"/></td></tr>
        <tr><td>ISBN</td><td><input type ="text" name="isbn4"/></td></tr>
        <tr><td># of copies</td><td><input type ="text" name="copies4"/></td></tr>
        <tr><td>Loan Length</td><td><select name="loanlen"> <option value="1">1 Week</option> 
          <option value="4">4 Weeks</option> </select> </td></tr>
        <tr><td><input type="submit" name="submit" value = "Add Book"/></td></tr>
    </table>
    </form> 
    </div>
<div style="text-align:center;">
  <button class="button button2" type="button" onclick="document.getElementById('addmember').style.display='block'">Add a Member</button>
    <form method = "post" action="addMember.php">
        <table border="1" bgcolor="#03C04A" id="addmember" style="display:none" class="center">
        <tr><td>Name</td><td><input type ="text" name="name5"/></td></tr>
        <tr><td>Card Number</td><td><input type ="text" name="cardnumber5"/></td></tr>
        <tr><td>Address</td><td><input type ="text" name="address5"/></td></tr>
        <tr><td>Phone Number</td><td><input type ="text" name="phonenumber5"/></td></tr>
        <tr><td>Username</td><td><input type ="text" name="uname"/></td></tr>
        <tr><td>Password</td><td><input type ="text" name="password"/></td></tr>
        <tr><td><input type="submit" name="submit" value = "Add Member"/></td></tr>
    </table>
    </form> 
    </div>
<div style="text-align:center;">
  <button type="button" class="button button2" onclick="document.getElementById('addstaff').style.display='block'">Add a Staff</button>
    <form method = "post" action="addStaff.php">
        <table border="1" bgcolor="#03C04A" id="addstaff" style="display:none" class="center">
        <tr><td>Member ID</td><td><input type ="text" name="membercardnum"/></td></tr>   
        <tr><td>Manager</td><td>
          <input type = "hidden" name = "manager" value = "0" />
          <input type ="checkbox" value="1" name="manager"/></td></tr>
        <tr><td><input type="submit" name="submit" value = "Add Staff"/></td></tr>
    </table>
    </form> 
    </div>
</body>
</html>