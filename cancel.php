<!DOCTYPE HTML>
<head>
		<link rel="stylesheet" type="text/css" href="pro.css">

</head>
		<body background="new2b0.jpg" class="img" >
<?php
	
	$servername="localhost";
	$username="root";
	$password="";
	$database="railway";
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn)
		die("Connection failed:".mysqli_connect_error());
	$sql="SELECT pnr,train_no,tdate,status,berth from `ticket`";
	$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
		$_SESSION['id']=$row['pnr'];
		echo "<table id='booking'>
		<tr>
		<th>PNR</th>
		<th>Travel Date</th>
		<th>Train Number</th>
		<th>Berth</th>
		<th>Status</th>
		</tr><tr>
		<td><input type='radio' name='book' value=".$row['pnr'].">".$row['pnr']."</td>
		<td>".$row['tdate']."</td>
		<td>".$row['train_no']."</td>
		<td>".$row['berth']."</td>
		<td>".$row['status']."</td>
		</tr>";
	}
	
	if(isset($_SESSION['id'])){
		$choice=$_SESSION['id'];
		$sql1="DELETE from `ticket` where `pnr`='$choice'";
		$result1=mysqli_query($conn,$sql1);
	
	}
?>
<body>
	<body>
	<ul>
		<li><a href="try.php">Home</a></li>
		<li class="dropdown" style="float: right;"><a href="#" class="dropbtn"><?php echo "Hi! " ?><i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
					<a href ="profile.php">My Profile</a>
				<a href ="bookings.php">My Bookings</a>
				<a href ="bookings.php?sess=logout">Sign out</a>
			</div>
		</li>
	</ul>
	<?php while($row=mysqli_fetch_assoc($result)){
		$_SESSION['id']=$row['pnr'];
		?><table id='booking'>
		<tr>
		<th>PNR</th>
		<th>Travel Date</th>
		<th>Train Number</th>
		<th>Berth</th>
		<th>Status</th>
		</tr><tr>
		<td><input type='radio' name='book' value="<?php $row['pnr'] ?>"><?php $row['pnr'] ?></td>
		<td><?php $row['tdate'] ?></td>
		<td><?php $row['train_no'] ?></td>
		<td><?php $row['berth'] ?></td>
		<td><?php $row['status'] ?></td>
		</tr>
	<?php } ?>
	<?php if(!isset($_SESSION['id'])){?>
		<h1 style="color:red">No tickets to show!!</h1>
		<?php } ?>
	<button type="submit" onclick="location.href='cancel.php'">SUBMIT</button>
</body>


</html>