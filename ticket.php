<!DOCTYPE HTML>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="pro.css">
<style>
button {
	color:red;
	padding:20px;
}
</style>
</head>
		<body background="new2b0.jpg" class="img" >
<?php 
	session_start();
	session_regenerate_id();
	$servername="localhost";
	$username="root";
	$password="";
	$database="railway";
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn)
		die("Connection failed:".mysqli_connect_error());
	if(isset($_POST['p_fname'])) $p_fname=$_POST['p_fname'];
	if(isset($_POST['p_lname']))$p_lname=$_POST['p_lname'];
	if(isset($_POST['gender']))$gender=$_POST['gender'];
	if(isset($_POST['age']))$age=$_POST['age'];
	if(isset($_POST['berth']))$berth=$_POST['berth'];
	if(isset($_POST['email']))$email=$_POST['email'];
	$sql="INSERT INTO `passenger`(`p_fname`, `p_lname`, `gender`, `age`, `email`) VALUES ('$p_fname','$p_lname','$gender','$age','$email')";
	$result=mysqli_query($conn,$sql);
	$x=(rand(10000000,99999999));
	$y=(rand(10000000,99999999));
	$z=$x.$y;
	$sql1="SELECT pid from `passenger` where `p_fname`='$p_fname' and `p_lname`='$p_lname' ";
	$result1=mysqli_query($conn,$sql1);
	while($row=mysqli_fetch_assoc($result1)){
		$pid=$row['pid'];
	}
	$u_email=$_SESSION['email'];
	$tdate=$_SESSION['tdate'];
	$train_no=$_SESSION['train_no'];
	$avl="SELECT avail_Sleeper,avail_3AC from `seat_avail` where `tdate`='$tdate' and `train_no`='$train_no'";
	$avl_res=mysqli_query($conn,$avl);
	while($row1=mysqli_fetch_assoc($avl_res)){
		$avail_Sleeper=$row1['avail_Sleeper'];
		$avail_3AC=$row1['avail_3AC'];
	}
	if($avail_Sleeper>0)
		$status="CONFIRMED";
	else
		$status="WAITING";
	$sql2="INSERT INTO `ticket`(`pnr`, `pid`, `tdate`, `train_no`, `u_email`, `berth`, `status`) VALUES ('$z','$pid','$tdate','$train_no','$u_email','$berth','$status')";	
		$result2=mysqli_query($conn,$sql2);
		if($_SESSION['class']=="3AC"){
		$sql3="UPDATE `seat_avail` SET `avail_Sleeper`=avail_Sleeper+1 where `tdate`='$tdate' and `train_no`='$train_no' ";
		$sql4="UPDATE `seat_avail` SET `avail_3AC`=avail_3AC-1 where `tdate`='$tdate' and `train_no`='$train_no'";
    	mysqli_query($conn,$sql3);
    	mysqli_query($conn,$sql4);
    }
?>
<div class="ticket">
	<h2>Your ticket has been booked</h2>
	<span>PNR:
	<span id="pnr"><?php echo $z; ?></span></span>
	<h3><?php echo "Passenger Name: ".$p_fname." ".$p_lname; ?></h3>
	<h3><?php echo "Ticket Status: Confirmed"; ?></h3>
</div>
	<button onclick="location.href='try.php'">Back to Home</button>


</div>
<script>

</script>
</body>
</html>