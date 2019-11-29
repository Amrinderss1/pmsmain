<html>
<head>
	<title>Signup</title>
	<link href="CSS/css.css" rel="stylesheet" type="text/css">
	<link href="CSS/try1.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
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
</head>
<body style="background:url(images/back0.jpg); height:100%; width:100%;">
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


	<div class="register2">
		<form method="post" id="register2" onsubmit="return validatePassword()">
			<?php
				if(!empty($error))
				{
					echo $error;
				}
			?>
			<h1>Thats All The Information We need Right Now </h1><br>
			<h3>Your Account has been created sucessfully Now you are ready to go into your account!<br>
				<a href="user.php">click here and log in into your new account</a>


		</form>
</div>
		
	</body>
	</html>