<?php
 session_start();
          if(!isset($_SESSION['userid']))
{
    // not logged in
    header('Location: errorpage.php');
    exit();
}
 $k= $_SESSION['userid'];
 $db = mysqli_connect('localhost','root','','invest1')
 or die('Error connecting to MySQL server.');  
?>
<!DOCTYPE>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<style type="text/css">
			#navele
	{
		color: white;
	}
	#navele:hover
	{
		border:0.1px solid white;
	}
	</style>
	</head>
<body>
	<h6 style="margin-left: 76%;margin-top: 20px;">Welcome user--
		<?php
		$query = "SELECT * FROM regis where userid= '$k'";
        mysqli_query($db, $query) or die('Error querying database.');
        $data = mysqli_query($db, $query);
        $result=mysqli_fetch_assoc($data);
        echo "&gt" .$result['name'];
		?>
	</h6>
  <hr id="hr1">
   <center>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(64, 64, 64,1);margin-top: -15px;">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
             <a id="navele" class="nav-item nav-link" href="home.php">Home</a>
             <a id="navele" class="nav-item nav-link" href="Investment.php" style="margin-left: 30px;">Investment</a>
             <a id="navele" class="nav-item nav-link" href="experts.php"  style="margin-left: 30px;">Experts</a>
             <a id="navele" class="nav-item nav-link" href="aboutus.php"  style="margin-left: 30px;">About Us</a>
             <a id="navele" class="nav-item nav-link " href="contactus.php"  style="margin-left: 30px;">Contact Us</a>
           <a href="logout.php">  <input type="submit" name="Logout" style="margin-left:720px ;margin-bottom: px;" value="Logout"   class="btn"  ></a><br>
          </div>
        </div>
     </nav>
 </center>
<div class="container">
 <h5 style="margin-top: 20px;"><center>Our Mission: Helping the World Invest — Better</center></h5>
 <hr>
 The Motley Fool is dedicated to helping the world invest — better. Founded in 1993 by brothers Tom and David Gardner, The Motley Fool helps millions of people attain financial freedom through our website, podcasts, books, newspaper column, radio show, mutual funds, and premium investing services.<br>
 In all we do, we take a different approach.<br>
 We believe – and have proven over decades – that the individual investor can beat the market.<br>
 We believe that anyone can do it, even if they don’t have a lot of time or money to devote to investing.<br>
 We believe in a long-term outlook, helping people build wealth over time.<br>
 We believe that the person best positioned to take care of your financial future is you.<br>
 And we work tirelessly on behalf of our hundreds of thousands of members who are enjoying the opportunities that come with having enough money to do the things that matter to them.<br>

<br>
<h5 style="margin-top: 20px;"><center>Our Culture: Helping the World Work – Better</center></h5>
 <hr>
 At the Fool, we believe people should have the freedom to follow their passion every day in roles they love. We work hard to understand the needs of our employees and deliver for them. We are confident that this, in turn, makes a great business. Take care of your employees and they will take care of your customers, who in turn take care of shareholders.

</div>
</body>
</html>