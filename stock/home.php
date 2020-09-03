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
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<style type="text/css">
	hr
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
	     table,td,th,tr
	    {
		border:1px solid black;
		text-align: center;
	    }
	    .divbar
	    {
          width: 500px;
          height: 260px;
          position: absolute;
          margin-left: 33%;
          margin-top: -150px;
	    }
	     .divbar1
	    {
          width: 220px;
          height: 150px;
          position: absolute;
          margin-left: 73%;
          margin-top: -80px;

	    }
	</style>
	<script type="text/javascript">
    
		google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', '	WORLD MARKET'],
          ['Germany', 200],
          ['United States', 300],
          ['Brazil', 400],
          ['Canada', 500],
          ['France', 600],
          ['INDIA', 300]
        ]);

        var options = {
        	 title: 'World market'
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
  </script>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Top Gains', 'Top Loose'],
          ['2016', 1170, 460],
          ['2017', 660, 1120],
          ['2018', 1030, 540]
        ]);

        var options = {
          chart: {
            title: 'Overall Market',
            subtitle: 'Gain and loose: 2015-2018',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

</head>
<body>
	<h6 style="margin-left: 76%;margin-top: 20px;">welcome user--
		<?php
		$query = "SELECT * FROM regis where userid= '$k'";
        mysqli_query($db, $query) or die('Error querying database.');
        $data = mysqli_query($db, $query);
        $result=mysqli_fetch_assoc($data);
        echo "&gt" .$result['name'];
		?>
	</h6>
   <hr>
   <center>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(64, 64, 64,1);margin-top: -15px;">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
             <a id="navele" class="nav-item nav-link" href="#">Home</a>
             <a id="navele" class="nav-item nav-link" href="investment.php" style="margin-left: 30px;">Investment</a>
             <a id="navele" class="nav-item nav-link" href="experts.php"  style="margin-left: 30px;">Experts</a>
             <a id="navele" class="nav-item nav-link" href="aboutus.php"  style="margin-left: 30px;">About Us</a>
             <a id="navele" class="nav-item nav-link " href="contactus.php"  style="margin-left: 30px;">Contact Us</a>
            <a href="logout.php"> <input type="submit" name="Logout" style="margin-left:720px ;margin-bottom: px;" value="Logout"  class="btn"  ></a><br>
          </div>
        </div>
     </nav>
 </center>
 <div id="regions_div" style="margin-top: 20px;width: 350px;height: 350px;float: left;margin-left: 20px;display: inline;"></div><h6 style="margin-top: 400px;margin-left: 100px;">World market</h6>
      <h6  style="float: left;position: absolute;margin-left: 33%;margin-top: -380px;width: 350px;">Top Gain(	&#x2191;) </h6>
    <table style="float: left;position: absolute;margin-left: 33%;margin-top: -350px;width: 400px;">
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
              <tr style="height: 30px;">
           	   <th>S.No</th>
               <th>Company</th>
               <th>Shares</th>
               <th>Worth</th>
             </tr>
               <?php 
               $i=1;  
                while($row=mysqli_fetch_array($result))
                 {
                 echo "<tr><td>".$i."</td>"."<td>".$row['company']."</td>"."<td>".$row['shares']."</td>"."<td>".$row['price']."</td></tr>";
                 $i=$i+1;
                 if($i>5)
                 {
                 	break;
                 }
                 } 
           ?>
           <td colspan="4"><a href="investment.php?gaincompany=4">  View all top Gain</a></td>
         
    </table>
     <h6  style="float: left;position: absolute;margin-left: 64%;margin-top: -380px;width: 350px;">Top loose (	&#x2193;)</h6>
    <table style="float: left;position: absolute;margin-left: 64%;margin-top: -350px;width: 400px;">
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
              <tr style="height: 30px;">
           	   <th>S.No</th>
               <th>Company</th>
               <th>Shares</th>
               <th>Worth</th>
             </tr>
               <?php 
               $i=1;  
                while($row=mysqli_fetch_array($result))
                 {
                 echo "<tr><td>".$i."</td>"."<td>".$row['company']."</td>"."<td>".$row['shares']."</td>"."<td>".$row['price']."</td></tr>";
                 $i=$i+1;
                 if($i>5)
                 {
                 	break;
                 }
                 } 
           ?>
         <tr >
        	<td colspan="4"><a href="investment.php?losscompany=6">  View all top loose</a></td>
        </tr>
    </table>
         <div id="barchart_material" class="divbar"></div>
         <div class="divbar1">
         	<h6 ><a href="investment.php?userinves=2"><button type="button" class="btn btn-outline-info">View all your investments</button></a></h6><br>
         	<h6><a href="investment.php?invest=1"><button type="button" class="btn btn-outline-info">Invest into a company</button></a></h6>
         </div>
</body>
</html>