<!DOCTYPE HTML>
<head>
		<link rel="stylesheet" type="text/css" href="pro.css">

</head>
		<body background="new2b0.jpg" class="img" >

<?php
session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$database="railway";
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn)
		die("Connection failed:".mysqli_connect_error());

		$u_email=$_SESSION['email'];
		$sql="SELECT pid,pnr,tdate,train_no,berth,status from `ticket` where `u_email`='$u_email'";

		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
			$pid=$row['pid'];
			$pnr=$row['pnr'];
			$tdate=$row['tdate'];
			$train_no=$row['train_no'];
			$berth=$row['berth'];
			$status=$row['status'];
		}
		if(isset($pid) && isset($train_no)){
		$sql1="SELECT p_lname,p_fname,tname from `passenger`,`train` where `pid`='$pid' and `train_no`='$train_no'";
		$result1=mysqli_query($conn,$sql1);
		while($row1=mysqli_fetch_assoc($result1)){
			$p_lname=$row1['p_lname'];
			$p_fname=$row1['p_fname'];
			$tname=$row1['tname'];
		}}
	if(isset($_GET['sess'])=="logout"){
	session_unset();
		header("location:try.php");}
?>
<body>
	<ul>
		<li><a href="try.php">Home</a></li>
		<li class="dropdown" style="float: right;"><a href="#" class="dropbtn"><?php echo "Hi! " ?><i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
					<a href ="profile.php">My Profile</a>
				<a href ="cancel.php">Cancel Ticket</a>
				<a href ="bookings.php?sess=logout">Sign out</a>
			</div>
		</li>
	</ul>

	<h1 class='heading'>My Bookings</h1>;
		<table id='booking'>
		<tr>
		<th>PNR</th>
		<th>Travel Date</th>
		<th>Train Number</th>
		<th>Train Name</th>
		<th>Passenger Name</th>
		<th>Berth</th>
		<th>Status</th>
		</tr>
		<tr>
		<td><?php if(isset($pnr)) echo "$pnr"; else echo "No bookings yet!!"; ?></td>
		<td><?php if(isset($tdate)) echo "$tdate"; else echo ""; ?></td>
		<td><?php if(isset($train_no)) echo "$train_no"; else echo ""; ?></td>
		<td><?php if(isset($tname)) echo "$tname"; else echo ""; ?></td>
		<td><?php if(isset($p_fname)&&isset($p_lname)) echo "$p_fname".' '."$p_lname"; else echo ""; ?></td>
		<td><?php if(isset($berth)) echo "$berth"; else echo ""; ?></td>
		<td><?php if(isset($status)) echo "$status"; else echo ""; ?></td>

		</tr>
</body>
</html>
