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
 <div style="width: 400px;height: 300px;background-color: gray;margin-top: 20px;margin-left: 60px;border: 1px solid Blue;float: left;">
 	<div style="height: 15%;background-color: white;"><center><h5 style="padding: 8px;border-bottom: 1px solid blue;">APPLE</h5></center></div>
 	<div ><img id="iconimg" src="appleexpert.jpg" style="width: 398px;height:85% "></div>
 </div>
  <div style="width: 400px;height: 300px;background-color: gray;margin-top: 20px;margin-left: 30px;border: 1px solid Blue;float: left;">
 	<div style="height: 15%;background-color: white;"><center><h5 style="padding: 8px;border-bottom: 1px solid blue;">MICROSOFT</h5></center></div>
 	<div ><img id="iconimg" src="microsoft.jpg" style="width: 398px;height:85% "></div>
 </div>
   <div style="width: 400px;height: 300px;background-color: gray;margin-top: 20px;margin-left: 30px;border: 1px solid Blue;float: left;">
 	<div style="height: 19%;background-color: white;border-bottom: 1px solid blue;"><center><h5 style="padding: 8px;">
INTERNATIONAL BUSINESS MACHINES CORPORATION</h5></center></div>
 	<div ><img id="iconimg" src="ibm.jpg" style="width: 398px;height:81% "></div>
 </div>
  </div>
   <div style="width: 400px;height: 300px;background-color: gray;margin-top: 20px;margin-left: 60px;border: 1px solid Blue;float: left;">
 	<div style="height: 15%;background-color: white;border-bottom: 1px solid blue;"><center><h5 style="padding: 8px;">
ADOBE</h5></center></div>
 	<div ><img id="iconimg" src="adobe.jpg" style="width: 398px;height:85% "></div>
 </div>
   <div style="width: 400px;height: 300px;background-color: gray;margin-top: 20px;margin-left: 30px;border: 1px solid Blue;float: left;">
 	<div style="height: 15%;background-color: white;"><center><h5 style="padding: 8px;border-bottom: 1px solid blue;">TATA</h5></center></div>
 	<div ><img id="iconimg" src="tcs.jpg" style="width: 398px;height:85% "></div>
 </div>
  <div style="width: 400px;height: 300px;background-color: gray;margin-top: 20px;margin-left: 30px;border: 1px solid Blue;float: left;">
 	<div style="height: 19%;background-color: white;border-bottom: 1px solid blue;"><center><h5 style="padding: 8px;">
WIPRO</h5></center></div>
 	<div ><img id="iconimg" src="wipro.jpg" style="width: 398px;height:81% "></div>
 </div>
 </body>
 </html>