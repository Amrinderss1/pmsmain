<?php
	/*including required files*/
	require_once('includes/functions.inc.php');

	if(!empty($_SESSION['USER_DETAILS']))
	{
		header("location: user.php");
		exit();
	}

	/*variables*/
	$error = NULL;

	if(!empty($_POST))
	{
		# objects
		$connection = connection();

		$email		= clear($_POST['email']);
		$password	= clear($_POST['password']);

		$s = "SELECT * FROM user_table WHERE email='{$email}'AND password='{$password}'";

		$query = mysqli_query($connection, $s);

		if($query->num_rows>0)
		{
			$_SESSION['USER_DETAILS'] = mysqli_fetch_assoc($query);

			header('location:user.php');
			exit();
		}
		else
		{
			$error= 'Username or Password Is Incorrect';
		}
	}
?><html>
<head>
	<title>login</title>
	<link href="CSS/login.css" rel="stylesheet" type="text/css">
	<link href="CSS/css.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
</head>
<body style="background:url(images/back0.jpg)">
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
			<a  href="index.php">Home</a>
			<a class="active" href="login.php">Login</a>
			<a href="contact.php">Contact</a>
			<a href="about.php">About</a>
		</div>

		<form action="" method="post" id="register">
			
			<div class="loginbox">
				<img src="images/download.png" class="avatar">
				&nbsp;&nbsp;
				<br><br>
				<?php
						if(!empty($error))
						{
							echo $error;
						}
					?>
				<h1>Login Here</h1><br>
				<form>
					<p>&nbsp;&nbsp;email</p>
					&nbsp;&nbsp;<input type="text" name="email" id="email" placeholder="Enter Username">
					<p>&nbsp;&nbsp;Password</p>
					&nbsp;&nbsp;<input type="password" name="password" id=email placeholder="Enter Password">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="" value="Login"><br>
					<a href="forget.php">&nbsp;&nbsp;&nbsp;&nbsp;Forgot Password?</a><br>
					<br>
					
					<a href="signup.php">&nbsp;&nbsp;&nbsp;&nbsp;Don't Have Account? Sign Up Today</a>
					
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
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

				</body>
				</html>
