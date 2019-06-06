<!DOCTYPE HTML>
<head>
	<link rel="stylesheet" type="text/css" href="pro.css">

</head>
		<body background="new2b0.jpg" class="img" >
	<?php
	 session_start();
	 $k="";
	$servername="localhost";
	$username="root";
	$password="";
	$database="railway";
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn)
		die("Connection failed:".mysqli_connect_error());
	$a= $_SESSION['email'];
	$sql="SELECT fname,lname,gender,bdate,email FROM `user` where `email`='$a'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result)){
		$fname=$row['fname'];
		$lname=$row['lname'];
		$gender=$row['gender'];
		$bdate=$row['bdate'];
		$email=$row['email'];
	}	
	if(isset($_GET['sess'])=="logout"){
	session_unset();
		header("location:try.php");}
	?>	

<ul>
		<li><a href="try.php">Home</a></li>
		<li class="dropdown" style="float: right;"><a href="#" class="dropbtn"><?php echo "Hi!  ".$fname ?><i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
				<a href ="bookings.php">My Bookings</a>
				<a href ="cancel.php">Cancel Ticket</a>
				<a href ="profile.php?sess=logout">Sign out</a>
			</div>
		</li>
	</ul>
	<h1 class="pro">My Profile</h1>
	<table id="profile">
			<tr>
				<th>Name</th>
				<td><?php echo $fname." ".$lname ?></tr>
			</tr>
			<tr>
				<th>Gender</th>
				<td><?php echo $gender ?></tr>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $email ?></tr>
			</tr>
			<tr>
				<th>Birthdate</th>
				<td><?php echo $bdate ?></tr>
			</tr>

</body>
</html>