<?php
session_start();
 $db = mysqli_connect('localhost','root','','invest1')
 or die('Error connecting to MySQL server.'); 
?>
<!DOCTYPE>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<style type="text/css">
		body
		{
			  -webkit-background-size: cover;
               -moz-background-size: cover;
              -o-background-size: cover;
               background-size: cover;
		}
		#navele
		{
			margin-left: 20px;
			color:white;
			font-weight: bold;
		}
		#navele:hover
		{
			color: rgb(179, 224, 255);
		}
		#logincard
		{
			width: 33%;
			height: 400px;
			opacity: 0.7;
			margin-top: 30px;
			margin-left: 33%; 
		}
			#logincard1
		{
			width: 33%;
			height: 40px;
			opacity: 0.9;
			margin-top: 30px;
			margin-left: 33%; 
		}
		#h3cap
		{
			text-align: center;
			margin-top: 40px;
		}
		#userid
		{
			width: 60%;
			height: 42px;
			margin-top: 20px;
			border-color: rgba(0, 0, 0,0.5);		
		}
		#btn
		{
			margin-top: 0px;
			margin-left: 42px;
			width: 100px;
		}
		#btn1
		{
			margin-top: 0px;
			width: 100%;
		}
		#img1
		{
			position: absolute;
			width: 35px;
			height: 25px;
			margin-left: 170px;
			margin-top: 15px;
			opacity: 0.5;

		}
		#socialdiv
		{
			height: 50px;
			margin-top: 40px;
			background-color: white;
		}
		#cnwith
		{
			margin-top: 15px;
			margin-left: 80px;
			float: left;
		}
	</style>
</head>
<body background="coin4.jpg" style="background-repeat: no-repeat; width: 100%; ">
	<H1>DELTA $ ONE</H1>

    
      <div style="margin-top: 100px;">
	      <div class="card" id="logincard">
	      <center>
	         <h3 id="h3cap">USER LOGIN</h3>
	        <form method="POST">
	         <input type="text" name="userid" required="" placeholder="userid" id="userid">
	         <input type="password" name="password" required="" placeholder="password" id="userid"><br>
	         <input style="border-spacing: 10px;margin-top: 50px;" type="checkbox"  name="cbox" value="Remember me"  > <span style="margin-left: 5px;"></span>  Remember Me
	         <button id="btn" class="btn btn-success" type="submit" name="login" onclick="validate();" >Sign in</button>	         
	     </form>
	     <?php
    error_reporting(0);
      if(isset($_POST['login']))
      {
      	$userid=$_POST['userid'];
      	$password=$_POST['password'];       
         $query1="select * from regis where userid='$userid' && password='$password'"; 
         $data1= mysqli_query($db,$query1);
         $total=mysqli_num_rows($data1);
         if($total==0)
         { 
           ?>
          <h5 style="color: red; position: absolute;"><center> <?php echo"username or password is wrong "; ?></center> </h5>
           <?php     
          }
        else
         {   
          $_SESSION['userid']=$userid;
          header('location: home.php');
          }
    
        }
 ?>
	       </center>
	        <div class="card" id="socialdiv">
	        	<h6 id="cnwith">Connect with</h6>
  	            <img id="img1" style="margin-left:200px; "  src="facebooklogo.svg" onclick="openfacebook()" >
  	           <img id="img1" style="margin-left: 250px;" src="twitterlogo.svg" onclick="opentwitter()">
  	           <img id="img1" style="margin-left: 300px;" src="instagram.svg" onclick="openinsta()">
  	          </div>
	      </div>
     </div>
      <div class="card" id="logincard1">
      	<a href="registration.php"><button id="btn1" class="btn btn-primary" type="button" onclick="validate();" >New User? Register</button></a>
      </div>

</body>
</html>