<?php
	/*including required files*/
	ini_set('display_errors',0);
	require_once('includes/functions.inc.php');

	if(empty($_SESSION['USER_DETAILS']))
	{
		header("location: login.php");
		exit();
	}
	$error=null;
	$connection=connection();
	# variables
	$arrayUser = $_SESSION['USER_DETAILS'];
	$email=$arrayUser['email'];
?>
<html>
<head>
	<title>PMS Pharmacy Stock Management System</title>
	<link href="CSS/css.css" rel="stylesheet" type="text/css">
	<link href="CSS/signup.css" rel=stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
	

	<style>
		h3{
			color:white;
			font-style: sans;
		}
		.footer {
		 position: 0;
  		 left: 0;
 		 bottom: 0px;
  		 width: 100%;
  		 height: 57px;
  		 background-color: blue;
  		 color: white;
 		 text-align: center;
		}
		
		select, option{
			width:350px;
			height: 50px;
			background-color: #ff1212;
			border: none;
			font-size: 20px;
			text-align: center;
			border-radius: 20px;
		}
		input[type="text"]{
			width: 30%;
			height: 40px;
			font-size:16px;
			border:none;
			border-bottom: 1px solid #fff;
			background: transparent;
			margin-bottom:20px;
			font-size:16px;
			outline:none;
			color:#FFFFFF;
		}
		input[type=button], input[type=submit], input[type=reset] 
		{
			 background-color: red;
 			 border: none;
 			 color: white;
 			 padding: 16px 32px;
 			 text-decoration: none;
 			 margin: 4px 2px;
 			 cursor: pointer;
 			 border-radius:20px;
		}
    .footer
    {
      position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
    }

		
	</style>
</head>
<body style="background:url(images/back1.jpg)">
	<h2>
		<font face="Courier New, Courier, monospace" color="#990000"size="6" >PMS Pharmacy Stock Management System</font>
	
	<a href="logout.php" style="float:right; text-decoration: none; color:white; text-align: right;" onMouseOver="this.style.color='red'"><i class="fa fa-user-circle"></i>
	
		 Hi <?php echo $arrayUser['name']; ?><br>Logout?</a>
	</h2>
	
	<br><br>
	<div class="topnav">
		<a href="index.php">Home</a>
		<div class="dropdown">
			<a class="active" href="#news"><?php echo $arrayUser['name'];?></a>
			<div class="dropdown-content">
				<a href="user.php">Back to panel</a>
				<a href="login.php">Logout</a>
			</div>
		</div>
		<a href="contact.php">Contact</a>
		<a href="about.php">About</a>
	</div>
<br>
<br><br>
	<h3>Please Choose Your Option Whether You Wanna Update Quantity After Selling medicines or you wanted to increse medicine quantity after purchasing your stock from vendor or wholesaler</h3><br>
<center>
	<a href="edit.php"><input type="button" value="After Selling Quantity Updatation"></a>
	<br>
	<a href="includestock.php"><input type="button" value="Increase Stock Quantity In your stock"></a>
</center>
<div class="footer">
  <p>(c) 2019. PMS Pharmacy Stock Management System. all rights reserved</p>
</div>

</body>
</html>