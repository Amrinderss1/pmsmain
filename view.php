<?php
	ini_set('display_errors',0);
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
	$email=$arrayUser['email'];

	$dp=$_POST['dp'];

?>
<html>
<head>
	<title>View stocks</title>
	<link href="CSS/css.css" rel="stylesheet" type="text/css">
	<link href="CSS/font.css" rel="stylesheet" type="text/css">
	<link href="CSS/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="CSS/forview.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
	<style>
		h2{
			color:white;
		}
		table 
		{
  			width: 100%;
		}
		th
		{
  			height: 50px;
		}
		th 
		{
 		    background-color: #4CAF50;
  			color: white;
		}
		tr:nth-child(even) 
		{
			background-color: #f2f2f2;
		}
		tr:nth-child(odd)
		{ 
			background-color: #d3d3d3;
		}
		tr:hover 
		{
			background-color: #ff0000;
		}
		th, td
		{
			padding: 15px;
  			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		td
		{
  			height: 50px;
  			vertical-align: bottom;
		}
		th 
		{
  			text-align: left;
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
	<div class="container m-5">
	<table width=50%>
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
	<br>
	<form method="post">
		<center><a href="signup2.php"><input type="button" value="Add More Medicine To Stock" id="btn1"></a><a href="quanmenu.php"><input type="button" value="Click to edit your stock Quantity" id="btn2"></a></center><br>
		<select name="dp" >
			<option selected>Select Medicine Category from Below</option>
			<option value="all">Full Stock</option>
			<option value="Strong Medicine">Strong Medicine</option>
			<option value="Medium Level Medicine">Medium Level Medicine</option>
			<option value="Light Medicine">Light Medicine</option>
			<option value=">Medical Equipment">Medical Equipment</option>
			<option value="Light(Cream)">Light(Cream)</option>
			<option value="Medicinal Cream">Medicinal Cream</option>
			<option value="Strong(Cream)">Strong(Cream)</option>
			<option value="Costometics">Costometics</option></select><input type="submit" value="Categories" id="subs"><br><br>
			<thead>
				<tr>
					<th>Medicine</th>
					<th>Quantity</th>
					<th>Rates</th>
					<th>Medicine category</th>
					<th>Stock</th>
				</tr>
			</thead>
				<?php
					if($dp=="all")
					{
						$s2="select medicine, qty, price, category from user where email='$email'";
					}
					else
					{
						$s2="select medicine, qty, price, category from user where email='$email' and category='$dp'";
					}
					$query2=mysqli_query($connection, $s2);
					while($row=mysqli_fetch_array($query2))
					{
				?>
						<tr>
							<td><?php echo $row['medicine'];?></td>
							<td><?php echo $row['qty'];?></td>
							<td><?php echo $row['price'];?></td>
							<td><?php echo $row['category'];?></td>
							<td><?php if($row['qty']>=100 && $row['qty']<=1000){ echo "Sufficient Stock Is Available";} else if($row['qty']>1000){echo" Excess stock is available";} else{ echo "You are running low on stocks";}?></td>
						</tr>
				<?php
					}
				?>
					


	</form>
	</table>
	<br><br><br><br><br><br><br>
</div>
<div class="footer">
  <p>(c) 2019. PMS Pharmacy Stock Management System. all rights reserved</p>
</div>
</body>
</html>