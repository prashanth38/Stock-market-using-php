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
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}


.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
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
             <a id="navele" class="nav-item nav-link" href="investment.php" style="margin-left: 30px;">Investment</a>
             <a id="navele" class="nav-item nav-link" href="experts.php"  style="margin-left: 30px;">Experts</a>
             <a id="navele" class="nav-item nav-link" href="aboutus.php"  style="margin-left: 30px;">About Us</a>
             <a id="navele" class="nav-item nav-link " href="contactus.php"  style="margin-left: 30px;">Contact Us</a>
           <a href="logout.php">  <input type="submit" name="Logout" style="margin-left:720px ;margin-bottom: px;" value="Logout"   class="btn"  ></a><br>
          </div>
        </div>
     </nav>
 </center>
 <div class="container">  
  <form id="contact" action="" method="post">
    <h3> Contact Us</h3>
    <h4>Contact us for custom quote</h4>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number (optional)" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Web Site (optional)" type="url" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
    
  </form>
</div>
</body>
</html>