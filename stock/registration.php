<html>
<head>
  <title>Registration page</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <script type="text/javascript">
    
function validateform(){  
var userid=document.myform.userid.value;  
var password=document.myform.password.value;
var name=document.myform.name.value;  
var accno=document.myform.accno.value; 
var custid=document.myform.custid.value; 
var branch=document.myform.branch.value; 
var phone=document.myform.phone.value; 
  var security=document.myform.security.value; 
if (userid==null || userid==""){  
  alert("new userid can't be blank");  
  return false;  
}

else if(password.length < 8 )
       {  
                   
          alert("password must be more than 8 charecters");
          return false;
       } 
  else if(name==null || name=='')
  {  
  alert(" enter name.");  
  return false;  
  }
  else if(accno.length<12 || accno.length>12 )
  {  
        alert(" Account number must  be 12 numbers");  
        return false; 
  }
  else if(custid.length<8  && custid.length>8){  
    
  alert(" enter custid and must be  6 charecters.");  
  return false;  

  }
  else if(branch==null || branch==''){  
  alert(" enter branch.");  
  return false;  
  }
  else if(phone.length<10 || phone.length>10){  

  alert("  phone number must be 10 digits.");  
  return false; 

  }
 
 
   else if(security==null || security==''){  
  alert(" enter security.");  
  return false;  
  }
   

}
  </script>
  <style type="text/css">
    .bb
    {
      opacity: 1;
    }
  </style>
</head>
<body style="margin-top: 30px;" background="five.jpg">
  <div class="container"  style="background-color: rgb(204, 204, 179);width: 100%">
      <div style="width:100%;height:40px;border:1px solid #000;  background-color:#D4F8F7;" >
    <h5 style="color:#040A82; margin-top: 10px; margin-left: 30px; ">New User</h5>
  </div>
  <form name="myform" method="post" action="" onsubmit="return validateform()" >  
    <div style="margin-top: 30px;">
           

<span style="margin-left: 30px; ">Create UserId<span style="color: red">*</span><span style="margin-left: 92px;">:</span></span> <input type="text" style="margin-left: 85px;" name="userid"><br/>  </div>
<div style="margin-top: 30px;">
<span style="margin-left: 30px;">Password<span style="color: red">*</span><span style="margin-left: 120px;">:
             </span>
          </span>
               <input type="password"  style="margin-left: 85px;" name="password"> <u style="color:blue;">(password is case sensitive <span style="color: red;">*</span>)</u><br/>
 </div>
<div style="margin-top: 30px;">
<span style="margin-left: 30px; margin ">Name<span style="color: red">*</span>
<span style="margin-left: 134px;">:</span></span> <input type="text" style="margin-left: 90px;" name="name"><br/>  </div>
<div style="margin-top: 30px;">
<span style="margin-left: 30px;">Phone No<span style="color: red">*</span><span style="margin-left: 110px;">:</span></span> <input type="text" pattern="^[0-9]*$"  style="margin-left: 90px;" name="phone"><br/> </div>
<div style="margin-top: 30px;">
<span style="margin-left: 30px;">Email Id <span style="color: red">*</span><span style="margin-left: 120px;">:</span></span> <input type="email"   style="margin-left: 90px;" name="email"><br/> </div>
<div style="margin-top: 30px;">
<input type="submit" class="btn" style="background-color: green;color: white; margin-left: 170px; margin-bottom: 20px; width: 100px;border-radius: 5px  ;
"  value="Register">

<input class="btn btn-primary" type="button"   onclick="location.href='login.php';"value="Login" style="margin-left: 30px; margin-top: -20px;">

 <?php
   $result="";         
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
  error_reporting(0);
 $db = mysqli_connect('localhost','root','','invest1') or die('Error connecting to MySQL server.');
$userid=$_POST['userid'];
$password=$_POST['password'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$muluserid=mysqli_query($db,"select * from regis where userid='$userid'");
$total=mysqli_num_rows($muluserid);
if($total==0)
{
$result=mysqli_query($db, "INSERT INTO regis(userid, password,name,phone,email)VALUES('$userid', '$password','$name','$phone','$email')");
}
else
{
  ?> <span style="color: red;margin-left: 30px;"><b>User id is alredy registered with another account,please choose other id</b> </span><?php
}
}
?>
<div>
<span style="color: green; margin-left: 30px;">
<?php
if ($result==1)
{
  
  ?>
 <span style="color: green"><b> <center>You have successfully registered </center></b></span>
  <?php

}



?>
</span>
</div></div></form></div>

</body>
</html>
