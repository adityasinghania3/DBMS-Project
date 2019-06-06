<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="pro.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.form-content {
	border-radius: 5%;
	height: auto;
    background-color: rgba(255,255,255,0.8);
    margin: 30px 30px;
    border: 5px solid black;
    width: 25%;
    float: left;
}
</style>
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
	$email=$_POST['email'];
	$psw=$_POST['psw'];
				/*	*/
	$sql="SELECT email FROM `user` WHERE `email`='$email' and `psw`='$psw'";
	$result=mysqli_query($conn,$sql);
	//$row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    $sql1="SELECT fname from `user` where `email`='$email' and `psw`='$psw'";
    $result1=mysqli_query($conn,$sql1);
    while($row = mysqli_fetch_assoc($result1)) {
        $k=$row["fname"];
        $_SESSION['login_user']=$row["fname"];

    }    
	if($count==1){
				$_SESSION['email']=$email;
	}
	else{
		header("location:login.php?sess=logout");
		/*$message="abcd";
		echo "<script type='text/javascript'>alert('$message');</script>";;
 */		
		}
if(isset($_GET['sess'])=="logout"){
	session_unset();
		header("location:try.php");

}

	
	mysqli_close($conn);
?>
<ul>
		<li><a href="try.php">Home</a></li>
		
		<li class="dropdown" style="float: right;"><a href="#" class="dropbtn"><?php echo "Hi!  ".$k ?><i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
				
				<a href ="login.php">Sign out</a>

			</div>
		</li>
	</ul>
	<form class="form-content" method="POST" action="seatavail.php">
		<div class="container">
				<label for="train_no"><b>Train Number</b></label>
			<input type="text" placeholder="Enter the Train No." name="train_no" required>
			<label for="src"><b>Source</b></label>
			<input type="text" placeholder="Enter the source station" name="src" required>
			<label for="dest"><b>Destination</b></label>
			<input type="text" placeholder="Enter the destination station" name="dest" required>
			<label for="tdate"><b>Travel date</b></label>
			<input type="date" placeholder="Enter Journey date" name="tdate" required>
			<label for="class"><b>Class</b></label>
			<select name="class">
  				  <option value="Sleeper">Sleeper</option>
  				  <option value="3AC">Third AC</option>
  				</select>
 			<label for="quota"><b>Quota</b></label>
			<select name="quota">
   			 <option value="General">General</option>
   			 <option value="Tatkal">Tatkal</option>
   			</select>
   			 <button class="button" style="width: 50%;margin-left:20%">Submit</button>
			</div>
		</form></div>
	 <button class="extra" onclick="location.href='profile.php'">My Profile</button>
	 <button class="extra" onclick="location.href='bookings.php'">My Bookings</button>
	 <button class="extra" onclick="location.href='cancel.php'">Cancel Ticket</button>
 


</body>
</html>

