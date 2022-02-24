

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

@media screen and (max-width: 300px) {
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
    session_start();
    include("conn.php");
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

<div style="text-align:center;">
  <a href="home.php" class="logo"><img src="library.png"></a>
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



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=2691675043";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<table style="border-collapse: collapse; width: 100%; text-align: center;">
<tbody>
<tr>
<td style="width: 100%; text-align: center;">
<div class="fb-page" style="text-align: center;" width="800" height="800" data-href="https://www.facebook.com/cplscangola" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
<div class="fb-xfbml-parse-ignore">
<blockquote cite="https://www.facebook.com/cplscangola"><a href="https://www.facebook.com/cplscangola">Carnegie Library</a></blockquote>
</tr>
</tbody>
</table>

<table style="border-collapse: collapse; width: 100%; text-align: center;">
<tbody>
<tr>
<td style="width: 100%; text-align: center;">
<iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJAalYYz8mFogRulseMI4ZDDA&key=AIzaSyBd2wltiCoBHtMSov4hRl-m6btrt6K_aQk"></iframe>
</tr>
</tbody>
</table>

</body>
</html>
