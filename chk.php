<?php
	/*including required files*/
	require_once('includes/functions.inc.php');

	if(empty($_SESSION['USER_DETAILS']))
	{
		header("location: login.php");
		exit();
	}
	
	$connection=connection();
	# variables
	$arrayUser = $_SESSION['USER_DETAILS'];
	
				
?>
<html>
<head>
	<title>PMS Pharmacy Management System</title>
	<link href="CSS/css.css" rel="stylesheet" type="text/css">
	<link href="CSS/font.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
	<style>
		select{
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
		
	</style>
</head>
<body style="background:url(images/back1.jpg)">
	<h2>
		<font face="Courier New, Courier, monospace" color="#990000"size="6" >PMS Pharmacy Management System</font>
	
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
		<a href="#contact">Medicines</a>
		<a href="#contact">Contact</a>
		<a href="#about">About</a>
	</div>