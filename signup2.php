<?php
	require_once('includes/functions.inc.php');
	if(empty($_SESSION['USER_DETAILS']))
	{
		header("location: login.php");
		exit();
	}
	$arrayUser = $_SESSION['USER_DETAILS'];
	$error = null;
	$congo=null;

	if(!empty($_POST))
		{
			$connection = connection();
			
			if(isset($_POST['med']))
			{
				$med=$_POST['med'];	
			}
			if(isset($_POST['qty']))
			{
				$qty=$_POST['qty'];	
			}
			if(isset($_POST['price']))
			{
				$price=$_POST['price'];
			}
			$cm=$arrayUser['company'];
			$em=$arrayUser['email'];
			$dp=$_POST['dp'];
			$s="select * from user where medicine='$med' and email='$em'";
			$query= mysqli_query($connection, $s);
			if($query->num_rows > 0)
			{
				$_SESSION['USER_DETAILS'] = mysqli_fetch_assoc($query);
				$error = 'Medicine Already Is In Your Stock Please Add Another Medicine from your stock<br>';
			}
			else
			{
				$reg="insert into user(company, medicine, qty, price, category, email) values('".$cm."','".$med."','".$qty."','".$price."','".$dp."','".$em."')";
				$retval=mysqli_query($connection, $reg);
				if(!$retval)
					{
						die("record could not be inserted ".mysql_error());
						exit;
					}
				header("location:signup2.php");
			}
				
		}


?>
<html>
<head>
	<title>Furthur Details</title>
	<link href="CSS/css.css" rel="stylesheet" type="text/css">
	<link href="CSS/try3.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
	<style type="text/css">.footer
	 {
		  position: fixed;
  		  left: 0;
  		  bottom: 0;
  		  width: 100%;
  		  background-color: red;
  		  color: white;
  		  text-align: center;
	}
	select, option{
			width:360px;
			height: 50px;
			background-color: #ff1212;
			border: none;
			font-size: 20px;
			text-align: center;
			border-radius: 20px;
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
				<a href="user.php">Back To Panel</a>
				<a href="login.php">Logout</a>
			</div>
		</div>
		<a href="contact.php">Contact</a>
		<a href="about.php">About</a>
	</div>
<div class="container">
	<div class="register2">
		<form method="post" id="register2" onsubmit="return validatePassword()">
			<?php
				if(!empty($error))
				{
					echo $error;
				}
			?>
			<h1>Hello <?php echo $arrayUser['company']; ?> </h1><br>
			<h3>You will be redirected to this page again after you click on submit button so that you can add more and more medicines from your stock, if you are done by adding your stock simply click "No more Adding Needed"</h3><br>
			<p>Enter Medicine Name</p><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="med" id="med" placeholder="Medicine Name" required><br>
			<p>Select Medicine category</p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;<select name="dp" >
			<option selected>Select Medicine Category from Below</option>
			<option value="Strong Medicine">Strong Medicine</option>
			<option value="Medium Level Medicine">Medium Level Medicine</option>
			<option value="Light Medicine">Light Medicine</option>
			<option value=">Medical Equipment">Medical Equipment</option>
			<option value="Light(Cream)">Light(Cream)</option>
			<option value="Medicinal Cream">Medicinal Cream</option>
			<option value="Strong(Cream)">Strong(Cream)</option>
			<option value="Costometics">Costometics</option></select><br><br>
			<p>Enter Quantity of above medicine</p><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="qty" id="qty" placeholder="Quantity of medicine" required><br>
			<p>Enter Rate of above medicine</p><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="price" id="price" placeholder="Price of medicine" required><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit" value="submit" id="sub"><br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="user.php" style="text-decoration:none;">No More Addding Needed Take me back</a><br>


		</form>
		<br><br><br><br><br><br>
</div>
</div>

<div class="footer">
  <p>(c) 2019. PMS Pharmacy Stock Management System. all rights reserved</p>
</div>
		
	</body>
	</html>