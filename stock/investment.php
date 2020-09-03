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
	<title>Investment</title>
	<script type="text/javascript">
		function validate()
		{
         var num=document.getElementById('priceofeach').value;
        if(isNaN(num))
         {
         	alert('Price of each should be in numbers');
         	return false;
         }
		}
	</script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<style type="text/css">
    #hr1
	{
		color:1px solid black;
		width: 100%;
	}
	#navele
	{
		color: white;
	}
	#navele:hover
	{
		border:0.1px solid white;
	}
	#leftelements
	{
		height: 40px;
		margin-bottom: 30px;
		text-align: center;
		padding: 10px;
	}
	 table,td,th,tr
	    {
		border:1px solid black;
		text-align: center;
		height: 40px;
	    }
	    th
	    {
	    	background-color: rgba(64, 64, 64,1);
	    	color: white;
	    }
	    tbody tr:nth-child(odd)
	    {
	    background: rgba(64, 64, 64,0.3) ;
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
 <div style="background-color: rgba(64, 64, 64,1); border-bottom: 1px; border-radius: 0px 0px 0px 0px;  width: 16%;position: absolute;" class="card"> 
   	<center >
         <div id="leftelements" onclick='location.href="?invest=1"'  style="margin-top: 30px;" class="card" > Invest</div> 
         <div id="leftelements" onclick='location.href="?userinves=2"'  class="card">Your Investments</div>
         <div id="leftelements"  onclick='location.href="?allcompanies=3"' class="card">All companies</div>
         <div id="leftelements" onclick='location.href="?gaincompany=4"' class="card">Gain companies</div> 
         <div id="leftelements"  onclick='location.href="?losscompany=6"' class="card">Loss comapnies</div> 
    </center>     
   </div>
   <div style=" border-bottom: 1px; border-radius: 0px 0px 0px 0px;  margin-left: 16%;width: 84%;position: absolute;" class="card">
   	<?php
   	if(isset($_GET['invest']))
   	{
   		?>
   		<center>
   			<div style="width:84%;height: 350px; padding: 5px; " id="invdiv">
   				
   		<form>
   			<h5 style="margin-top: 40px;">INVEST INTO A COMPANY</h5>
   			<hr style="margin-top: 20px; color: 1px solid black;">
   			Name of the company :<select style="height: 32px;width: 180px;" name="cmpyname">
   				                   <option>GNI</option>
   				                   <option>Intel</option>
   				                   <option>Time Walker</option>
   				                   <option>Citi group</option>
   				                   <option>Facebook</option>
   				                   <option>Oracle</option>
   				                   <option>Bank of America</option>
   				                   <option>Microsoft</option>
   				                   <option>pifizer</option>
   				                   <option>Homedepot</option>
   				                   <option>Apple</option>
   				                   <option>Amazon</option>
   				                   <option>AT&T</option>
   				                   <option>Walmart</option>
   				                   <option>Chevron</option>
   				                   <option>Zee Entertain</option>
   				                   <option>UPL</option>
   				                   <option>Kotak Mahindra</option>
   				                   <option>NTPC</option>
   				                   <option>BPCL</option>
   				                   <option>M&M</option>
   				                   <option>HUL</option>
   				                   <option>Hindalco</option>
   				                   <option>Admin ports</option>
   				                   <option>Coal india</option>
   				                   <option>ONGC</option>
   				                   <option>Infosys</option>
   				                   <option>TCS</option>
   				                   <option>Gail</option>
   				                   <option>Cipla</option>
   			                    </select> <br>
   			Number of shares:<input type="number" required="" name="shares" min="1" style="margin-top: 15px;margin-left: 33px;"><br>
   			<button type="submit" class="btn btn-outline-success" style="margin-top: 20px;" onclick="validate()" name="buy">Buy</button>
   		</form>
   			</div>
  
   	</center>
   		<?php
   	}
   if(isset($_GET['buy']))
   {
   	$company=$_GET['cmpyname'];
   	$shares=$_GET['shares'];
    $query2="SELECT eachprice from companyshares where company='$company'";
    $re3=mysqli_query($db,$query2);
    $row1=mysqli_fetch_assoc($re3);
    $price=$row1['eachprice'];
   	$total=$shares*$price;
   	date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');
    $query1="SELECT * from companyshares where company='$company'";
    $re1=mysqli_query($db,$query1);
    $row=mysqli_fetch_assoc($re1);
    $preprice=$row['price'];
    $afterinves=$preprice+$total;
    $preshares=$row['shares'];
    $aftershares=$preshares+$shares;
    $query1="UPDATE `companyshares` SET `shares`='$aftershares',`price`='$afterinves' WHERE company='$company'";
    $re2=mysqli_query($db,$query1);
    $query="INSERT INTO `userinvestment`(`company`, `shares`, `eachprice`, `total`, `userid`, `date`) VALUES ('$company','$shares','$price','$total','$k','$date')";
    $re=mysqli_query($db,$query);
    if($re)
    {
    	?><h6 style="color: green;padding: 30px;">You have buyed the <b><?php  echo $shares;?></b> shares with the price of <b><?php  echo $price;?></b>  each and total is <b><?php  echo $total;?></b>. </h6><?php
    }
   }

  if(isset($_GET['userinves']))
  {
  	?><center><h5 style="margin-top: 20px;">Your Investments</h5>
  		<?php
            $query="SELECT * FROM `userinvestment` WHERE userid='$k'";
            $result=mysqli_query($db,$query);
            $numrows = mysqli_num_rows($result);
            if($numrows<1)
            {
               ?> <h6 style="color: red;">Sorry You have not yet invested in any company.</h6><?php
                exit();
            }
             ?>
  		<table id="restable" style="box-shadow: 2px 2px black; margin-top: 20px; width: 60%;">
              <tr style="height: 30px;">
           	   <th>S.No</th>
               <th>Company</th>
               <th>Shares</th>
               <th>Price of each</th>
                <th>Total cost</th>
               <th>Date</th>
             </tr>
               <?php 
               $i=1;  
                while($row=mysqli_fetch_array($result))
                 {
                 echo "<tr><td>".$i."</td>"."<td>".$row['company']."</td>"."<td>".$row['shares']."</td>"."<td>".$row['eachprice']."</td>"."<td>".$row['total']."</td>"."<td>".$row['date'] ."</td></tr>";
                 $i=$i+1;
                 } 
           ?>
  	</center>
  	<?php
    }
  if(isset($_GET['allcompanies']))
  {
  	 ?><center><h5 style="margin-top: 20px;">All Companies shares</h5>
  		<?php
            $query="SELECT * FROM `companyshares`";
            $result=mysqli_query($db,$query);
            $numrows = mysqli_num_rows($result);
            if($numrows<1)
            {
               ?> <h6 style="color: red;">Sorry You have not yet invested in any company.</h6><?php
                exit();
            }
             ?>
  		<table id="restable" style="box-shadow: 2px 2px black; margin-top: 20px; width: 60%;">
              <tr style="height: 30px;">
           	   <th>S.No</th>
               <th>Company</th>
               <th>Shares</th>
               <th>Each price</th>
               <th>Worth</th>
             </tr>
               <?php 
               $i=1;  
                while($row=mysqli_fetch_array($result))
                 {
                 echo "<tr><td>".$i."</td>"."<td>".$row['company']."</td>"."<td>".$row['shares']."</td>"."<td>".$row['eachprice']."</td>"."<td>".$row['price']."</td></tr>";
                 $i=$i+1;
                 } 
           ?>
  	</center>
  	<?php  
  }
  if(isset($_GET['gaincompany']))
  {
  	 ?><center><h5 style="margin-top: 20px;">Gain Companies</h5>
  		<?php
            $query="SELECT * FROM `companyshares` WHERE price>0 ORDER BY price DESC";
            $result=mysqli_query($db,$query);
            $numrows = mysqli_num_rows($result);
            if($numrows<1)
            {
               ?> <h6 style="color: red;">Sorry You have not yet invested in any company.</h6><?php
                exit();
            }
             ?>
  		<table id="restable" style="box-shadow: 2px 2px black; margin-top: 20px; width: 60%;">
              <tr style="height: 30px;">
           	   <th>S.No</th>
               <th>Company</th>
               <th>Shares</th>
               <th>Each price</th>
               <th>Worth</th>
             </tr>
               <?php 
               $i=1;  
                while($row=mysqli_fetch_array($result))
                 {
                 echo "<tr><td>".$i."</td>"."<td>".$row['company']."</td>"."<td>".$row['shares']."</td>"."<td>".$row['eachprice']."</td>"."<td>".$row['price']."</td></tr>";
                 $i=$i+1;
                 } 
           ?>
  	</center>
  	<?php  
  }
    if(isset($_GET['losscompany']))
  {
  	 ?><center><h5 style="margin-top: 20px;">Loss Companies</h5>
  		<?php
            $query="SELECT * FROM `companyshares` WHERE price<0 ORDER BY price DESC";
            $result=mysqli_query($db,$query);
            $numrows = mysqli_num_rows($result);
            if($numrows<1)
            {
               ?> <h6 style="color: red;">Sorry You have not yet invested in any company.</h6><?php
                exit();
            }
             ?>
  		<table id="restable" style="box-shadow: 2px 2px black; margin-top: 20px; width: 60%;">
              <tr style="height: 30px;">
           	   <th>S.No</th>
               <th>Company</th>
               <th>Shares</th>
               <th>Each price</th>
               <th>Worth</th>
             </tr>
               <?php 
               $i=1;  
                while($row=mysqli_fetch_array($result))
                 {
                 echo "<tr><td>".$i."</td>"."<td>".$row['company']."</td>"."<td>".$row['shares']."</td>"."<td>".$row['eachprice']."</td>"."<td>".$row['price']."</td></tr>";
                 $i=$i+1;
                 } 
           ?>
  	</center>
  	<?php  
  }
   	?>
   </div>
</body>
</html>