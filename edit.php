<?php error_reporting (E_ALL ^ E_NOTICE); ?>
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
	$quan=$_POST['txtvalue'];
	$dp=$_POST['dp'];
	$q="select qty from user";
	$qr=mysqli_query($connection,$q);
	$row=mysqli_fetch_array($query2);


	$s="update user set qty = qty-".$quan." where medicine='".$dp."' and email='".$email. "'";
	$query=mysqli_query($connection,$s);
	if($quan==0)
	{
		$s1="delete from user where medicine='".$dp."' and email='".$email. "'";
		$query1=mysqli_query($connection,$s1);
	}	

?>

<html>
<head>
	<title>PMS Pharmacy Stock Management System</title>
	<link href="CSS/css.css" rel="stylesheet" type="text/css">
	<link href="CSS/signup.css" rel=stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
	

	<style>
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
<form method="post" action="">
<center>
  <select name="dp" >
  		<option value="Select Medicine from your stock" selected>Select Medicine from your stock</option>
  		<?php
  			$s="select medicine from user where email='$email'";
  			$query=mysqli_query($connection,$s);
  			while($row=mysqli_fetch_array($query))
  			{
  		?>

  			<option value="<?php echo($row['medicine']);?>"><?php echo ($row['medicine']);?></option>
  		<?php
  			}
  		?>
  </select>
  <br>
  <br>
  <font color="white">
  <h3>How many quantity you sold ?</h3>
  <input name="txtvalue" type="text" placeholder="Enter updated quantity here">
  <br><br>
  <input type="submit" name="subs" value="Click to update">
  <h3>Please note:- If you want to delete medicine from your stock then select medicine and write 0 in quantity box</h3></font>
  <?php
  		if(!empty($error))
  		{
  			echo $error;
  		}
  ?>
  </form>
</center>
<br><br><br><br><br><br><br><br>
</style>
<div class="footer">
  <p>(c) 2019. PMS Pharmacy Stock Management System. all rights reserved</p>
</div>

</body>
</html>