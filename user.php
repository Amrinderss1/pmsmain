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
	<title>PMS Pharmacy Stock Management System</title>
	<link href="CSS/css.css" rel="stylesheet" type="text/css">
	<link href="CSS/font.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
	<style type="text/css">
		.footer
   	   {
      		position: fixed;
        	left: 0;
        	bottom: 0;
        	width: 100%;
        	background-color: red;
        	color: white;
       	    text-align: center;
    }</style>
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
	<h1><center><font color="White">Welcome <?php echo $arrayUser['company'];?></font></center></h1>
	<br>
	<h3><center><font color="White">Greetings from PMS Pharmacy Stock Management System here you can manage your stock in just one go,<br> purchased some medicine? update here, Sold Some Medicine update here through this now you don't need any stock book just website is enough
	</font></center></h3>
	<br><br><center><a href="signup2.php"><i class="fa fa-edit"><br>Add medicine</i></a>&nbsp;<a href="view.php"><i class="fa fa-book"><br>View stocks</i></a>&nbsp;<a href="quanmenu.php"><i class="fa fa-edit"><br>Edit stock</i></a></center>
<div class="footer">
  <p>(c) 2019. PMS Pharmacy Stock Management System. all rights reserved</p>
</div>
	

</body>
</html>