<?php
	require_once('includes/functions.inc.php');

	if(!empty($_SESSION['USER_DETAILS']))
	{
		header("location: user.php");
		exit();
	}
	$error=null;
	if(!empty($_POST))
	{
		$connection=connection();

		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['pass'];
		$s="select * from user_table where email='$email'";
		$query=mysqli_query($connection,$s);
		$s1="select * from user_table where phno='$phone' and email='$email'";
		$query1=mysqli_query($connection,$s1);
		if($query->num_rows>0)
		{
			$_SESSION['USER_DETAILS'] = mysqli_fetch_assoc($query);
			if($query1->num_rows>0)
			{
				$_SESSION['USER_DETAILS'] = mysqli_fetch_assoc($query1);
				$s2="update user_table set password =".$password." where email='".$email. "'";
				$query2=mysqli_query($connection,$s2);
				header("location:forgot1.php");
			}
			else
			{
				$error="Phone number didn't match with this Email ID";

			}
		}	
		else
		{
			$error="Oh! User not found in our directory!<br>Do you want to join us?";
		}
	}
?>
<html>
<head>
<title>Forgot password</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
<link href="CSS/css.css" rel="stylesheet" type="text/css">
<link href="CSS/forget.css" rel="stylesheet" type="text/css">
</head>
<body style="background:url(images/back0.jpg); height:100%; width:100%;">
<h2>	
				<font face="Courier New, Courier, monospace" color="#990000"size="6" >PMS Pharmacy Management System</font>
				<a href="login.php" class="fa fa-user-circle" style="float:right"></a>
				<a href="https://www.instagram.com/amrinderss1" class="fa fa-instagram" style="float:right"></a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="#" class="fa fa-twitter"style="float:right"></a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="#" class="fa fa-facebook" style="float:right"></a>
		</h2>
		<br>
		<div class="topnav">
  				<a class="active" href="index.php">Home</a>
  				
  				<div class="dropdown">
    				<a href="login.php">Login</a>
    						<div class="dropdown-content">
     								 <a href="#">Customer</a>
     				 				 <a href="#">Shopkeeper</a>
				            </div>
    	 		</div>
  				<a href="#contact">Medicines</a>
 			    <a href="#contact">Contact</a>
 			    <a href="#about">About</a>
 		</div>
 		
 		<div class="frgtbox">
 			<form action="" method="post" id="register">
 				<h1>Forgot Password<br><br></h1>
 				<br>
 				<?php
						if(!empty($error))
						{
							echo $error;
						}
					?>
 				<h5>Don't Worry Just Fill necessary details below so that we can verify that this account belongs to you<br>Please Note:- your password will only be changed after you enter correct information and we match it from our end</h5>
 				<p>Enter your Email ID:</p><br>
 				&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" id="email" placeholder="Enter your email id" required><br>
 				<p>Enter Your Phone Number:</p><br>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="phone" id="phone" placeholder="Enter your Phone Number" required><br>
				<p>Enter Your New Password:</p><br>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass" id="pass" placeholder="Enter your New Password" required><br>
				 
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit" value="submit" id="sub"><br>
				 <a href="login.php">Take me back to login page</a>
				  
			 </form>

		
			</div>			
 </body>
 </html>