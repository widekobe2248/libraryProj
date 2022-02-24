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
  width:fit-content;
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

<?php
    $sqlBook = "SELECT * FROM books";
    $bookResult = mysqli_query($conn, $sqlBook);

 ?>


<div style="text-align:center;">
  <button type="button" class="button button2" onclick="document.getElementById('editbookdb').style.display='block'">Edit the book Database</button>
      <table border="1" bgcolor="#03C04A" id="editbookdb" style="display:none" class="center">
      <tr>
            <th> Book Title </th>
            <th> Book Author </th>
            <th> Book ISBN </th>
            <th> Copies </th>
            <th> Loan Length</th>
            <th> Update </th>
            <th> Delete </th>
        </tr>
        <?php
          while($row = mysqli_fetch_assoc($bookResult))
          {

            echo"<tr>\n <form action='updateBook.php' method='post'>";
            echo"<td> <input type='text' style='text-align:center;' size='10' id='title' name='title' value ='" . $row["title"] . "'> </td>\n";
            echo"<td> <input type='text' style='text-align:center;' size='10' id='author' name='author' value ='" . $row["author"] . "'> </td>\n";
            echo"<td> <input type='text' style='text-align:center;' size='10' id='isbn' name='isbn' value ='" . $row["isbn"] . "'> </td>\n";
            echo"<td> <input type='text' style='text-align:center;' size='10' id='num_copies' name='num_copies' value ='" . $row["num_copies"] . "'> </td>\n";
            echo"<td> <input type='text' style='text-align:center;' size='10' id='loan_len' name='loan_len' value ='" . $row["loan_len"] . "'> </td>\n";
            echo"<td> <input type='hidden' id='isbn' name='isbn' value='" .$row["isbn"]. "'>
            <input type='submit' value=Update> </form> </td>\n";
            echo"<td> <form action='deleteBook.php' method='post'> <input type='hidden' id='isbn' name='isbn' value='" .$row["isbn"]. "'>
            <input type='submit' value=Delete> </form> </td>\n";
          }
        ?>

      </table>
</div>

<?php
    $sqlMember = "SELECT * FROM members";
    $memberResult = mysqli_query($conn, $sqlMember);

 ?>
<div style="text-align:center;">
  <button type="button" class="button button2" onclick="document.getElementById('editmemberdb').style.display='block'">Edit the member Database</button>
        <table border="1" bgcolor="#03C04A" id="editmemberdb" style="display:none" class="center"> 
        <tr>
            <th> Name </th>
            <th> Card Number </th>
            <th> Telephone </th>
            <th> Address </th>
            <th> Update </th>
            <th> Delete </th>
        </tr>
        <?php
          while($row = mysqli_fetch_assoc($memberResult))
          {

            echo"<tr>\n <form action='updateMember.php' method='post'>";
            echo"<td> <input type='text' style='text-align:center;' size='10' id='name' name='name' value ='" . $row["name"] . "'> </td>\n";
            echo"<td> <input type='text' style='text-align:center;' size='10' id='card_num' name='card_num' value ='" . $row["card_num"] . "'> </td>\n";
            echo"<td> <input type='text' style='text-align:center;' size='10' id='telephone' name='telephone' value ='" . $row["telephone"] . "'> </td>\n";
            echo"<td> <input type='text' style='text-align:center;' size='10' id='address' name='address' value ='" . $row["address"] . "'> </td>\n";
            echo"<td> <input type='hidden' id='card_num' name='card_num' value='" .$row["card_num"]. "'>
            <input type='submit' value=Update> </form> </td>\n";
            echo"<td> <form action='deleteMember.php' method='post'> <input type='hidden' id='card_num' name='card_num' value='" .$row["card_num"]. "'>
            <input type='submit' value=Delete> </form> </td>\n";
          }
        ?>
    </table>
    </div>

  <?php
    $sqlStaff = "SELECT * FROM members,staff WHERE members.card_num=staff.card_num ";
    $sqlStaff = "SELECT * FROM members INNER JOIN staff ON members.card_num=staff.card_num ";
    $staffResult = mysqli_query($conn, $sqlStaff);


 ?>    
<div style="text-align:center;">
  <button type="button" class="button button2" onclick="document.getElementById('editstaffdb').style.display='block'">Edit the staff Database</button>
        <table border="1" bgcolor="#03C04A" id="editstaffdb" style="display:none" class="center">
        <tr>
            <th> Name </th>
            <th> Card Number </th>
            <th> Manager </th>
            <th> Update </th>
            <th> Delete </th>
        </tr>
        <?php
          while($row = mysqli_fetch_assoc($staffResult))
          {
            $yes = "";
            $no = "";
            if($row['manager'] == 1)
            {
              $yes = "selected";
            }
            else 
            {
              $no = "selected";
            }

            echo"<tr>\n <form action='updateStaff.php' method='post'>";
            echo"<td>" . $row['name'] ." </td>\n";
            echo"<td> " . $row["card_num"] . " </td>\n";
            echo"<td> <select style='text-align:center;' id='manager' name='manager'> 
            <option value = 'yes' " .$yes."> Yes </option> 
            <option value = 'no' " .$no."> No </option> </select> </td>\n";
            echo"<td> <input type='hidden' id='staff_id' name='staff_id' value='" .$row["staff_id"]. "'>
            <input type='submit' value=Update> </form> </td>\n";
            echo"<td> <form action='deleteStaff.php' method='post'> <input type='hidden' id='staff_id' name='staff_id' value='" .$row["staff_id"]. "'>
            <input type='submit' value=Delete> </form> </td>\n";
          }
        ?>
    </table>
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