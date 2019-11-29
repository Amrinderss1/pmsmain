<?php
	require_once('includes/functions.inc.php');
	if(!empty($_SESSION['USER_DETAILS']))
	{
		header("location: user.php");
		exit();
	}
	$error = null;
	$congo=null;
	if(!empty($_POST))
		{
			$connection = connection();

			$uname=$_POST['name'];
			$email=$_POST['email'];
			$phno=$_POST['phone'];
			$pass=$_POST['password'];
			$cname=$_POST['cname'];

			$s="select * from user_table where email='$email'";
				$query = mysqli_query($connection, $s);

			$s1="select * from user_table where phno='$phno'";
				$query1= mysqli_query($connection, $s1);

			$s2="select * from user_table where company='$cname'";
				$query2= mysqli_query($connection, $s2);

				if($query->num_rows > 0)
				{
					$_SESSION['USER_DETAILS'] = mysqli_fetch_assoc($query);
					$error = 'This email id is already taken';
				}
				else if ($query1->num_rows > 0)
				{
					$_SESSION['USER_DETAILS'] = mysqli_fetch_assoc($query1);
					$error='This Phone Number is already registered with another account please recheck your number you enetered or try to add another number';
				}
				else if ($query2->num_rows>0)
				{
					$_SESSION['USER_DETAILS'] = mysqli_fetch_assoc($query2);	
					$error='This company is already registered with another account';
				}
				else
				{
					$reg="insert into user_table(name, company, email, phno, password) values('".$uname."', '".$cname."','".$email."','".$phno."','".$pass."')";
					$retval=mysqli_query($connection, $reg);
					if(!$retval)
					{
						die("record could not be inserted ".mysql_error());
						exit;
					}
					header("location:sg.php");
				}
			}
?>
<html>
<head>
	<title>Signup</title>
	<link href="CSS/css.css" rel="stylesheet" type="text/css">
	<link href="CSS/try.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

</head>
<body style="background:url(images/back0.jpg); height:100%; width:100%;">
	<table width="100%">
	<h2>
		<font face="Courier New, Courier, monospace" color="#990000"size="6" >PMS Pharmacy Stock Management System</font>
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
		<a href="login.php">Login</a>
		<a href="#contact">Contact</a>
		<a href="#about">About</a>
	</div>
<div class="container">
	<div class="register">
		<form method="post" id="register" onsubmit="return validatePassword()">
			<?php
				if(!empty($error))
				{
					echo $error;
				}
			?>
			<h1>Sign Up</h1><br>
			<p>Your Name:</p><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" id="name" placeholder="Enter your name" required><br>
			<p>Your Company Name:</p><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cname" id="cname" placeholder="Enter your company name" required><br>
			<p>Email ID :</p><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" id="email" placeholder="Enter your email id" required><br>
			<p>Phone Number:</p><br>

			&nbsp;&nbsp;&nbsp;&nbsp;<input type="phone" name="phone" id="phone" placeholder="Enter your 10 digit phone number" required><br>
			<p>Password:</p><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" id="password" placeholder="create your password" required><br>
			<p>Re-Enter Password:</p><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="cpassword" id="confirm_password" placeholder="Re-Enter your created password" required><br>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit" value="submit" id="sub"><br>

			<a href="login.php">Take me back to login page</a>

		</form>
</div>
</div>
<br>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<footer>
				<font color="White">
					<tr style="background-color:#000033" style="border:#000033">
						<td colspan="12"><br><center><h3><font color="white">Info And Links</font></h3></center>
							<table style="background-color:#000033">
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td><td></td>
									<td></td>
									<td></td>
									<td ><font color="white">0ur Contact
										<hr /><br />
										<ul type="disc">
											<li>Phone:+91-8902326828<br />:+91-7503755807<br />:+91-8375865195</li>
											<li>Email:Info@pmspharmacy.in</li>
										</ul></font>
									</td>
									<td ><font color="white">Some Online Medicines Portal
										<hr /><br />
										<ul type="disk">
											<li><a href="https://www.Netmeds.com" style="text-decoration:none; color: white; " onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Netmeds</a><br />
												<a href="https://www.pharmeasy.com" style="text-decoration:none; color: white" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Pharmeasy(India Ki Pharmacy)</a><br />
												<a href="https://www.medlife.com" style="text-decoration:none; color: white" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">MedLife</a></li>
												<li><a href="https://www.google.com/search?q=ponline+pharmacy+companies&oq=ponline+pharmacy+companies&aqs=chrome..69i57j0l4.11565j0j4&sourceid=chrome&ie=UTF-8" style="text-decoration:none; color: white" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">And Many More</a></li>
											</ul></font>
										</td>
										<td>
											<font color="white">About Medicines
												<hr /><br />
												<ul type="disc">
													<li>
														<a href="https://www.practo.com" style="text-decoration:none; color: white" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">PRACTO Health Experts</a><br />
														<a href="https://www.mayoclinic.org" style="text-decoration:none; color: white" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Mayo Clinic</a><br />
														<a href="https://www.webmd.com" style="text-decoration:none; color: white" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">WebMD</a>
													</li>
													<li>Across India</li>
												</ul>
											</font>
										</td>
										<td>
											<font color="white">
												<br /><br /><br />Some Medical Terms
												<hr /><br />
												<ul type="disk">
													<a href="https://www.aimseducation.edu/blog/all-essential-medical-terms/" style="text-decoration:none; color: white; " onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">
														<li>Brachi/o – Arm</li>
														<li>Cardi/o – Heart</li>
														<li>Cyt/o – Cell.</li>
														<li>Derm/a, derm/o, dermat/o – Skin.</li>
														<li>Encephal/o – Brain</li>
														<li>Gastr/o – Stomach.</li>
														<li>Hemat/o – Blood</li>
													</ul>
												</font>
											</a>
										</td>
										<td><font color="white">Quick Links
											<hr /><br />
											<ul type="disc">
												<li>Login</li>
												<li>Medicines</li>
												<li>About Us</li>
												<li>Contact Us</li>
											</ul></font>
										</td>
										<td></td>
										<td></td>
									</tr>
									<tr><td></td></tr>
									<tr><td></td></tr>
									<tr><td></td></tr>
								</table>
								<center><h1><font color="white">PMS Pharmacy Stock Management System pvt Ltd.</font></h1></center>
							</td>

						</tr>
						<tr bgcolor="#000033">
							<td colspan="12"><center><font color="white" size="+2">(C) All Right Reserved. Made By Amrinder And Surya<br /><a href="#" class="fa fa-facebook" style="float:center"></a>
								<a href="https://www.instagram.com/amrinderss1" class="fa fa-instagram" style="float:center"></a>
								<a href="#" class="fa fa-twitter"style="float:center"></a></font></center></td>
							</tr>



						</font>
</footer>
</table>
<script type="text/javascript">
			function validatePassword()
			{
				var password = document.getElementById("password");
				var confirm_password = document.getElementById("confirm_password");

				if(password.value != confirm_password.value)
				{
					confirm_password.setCustomValidity("Passwords Don't Match");
					return false;
				}

				return true;
			}
		</script>
		
	</body>
	</html>