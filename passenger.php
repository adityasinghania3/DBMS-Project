<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="pro.css">
	<style>

/* Modal Content */
.form-content {
	
	height: auto;
    background-color: rgba(255,255,255,0.8);
    margin: 30px;
    border: 5px solid black;
    border-radius: 10px;
    width: 30%;
    float: left;
}
.container {
    padding: 16px;
    font-size: 15px;
    color: black;
}
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
	$k="";
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn)
		die("Connection failed:".mysqli_connect_error());
	if(!isset($_SESSION['email'])){
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$sql="SELECT email FROM `user` WHERE `email`='$email' and `psw`='$psw'";
	$result=mysqli_query($conn,$sql);
	//$row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    while($row1=mysqli_fetch_assoc($result)){
    	$_SESSION['email']=$row1["email"];
    }
if($count==1){
		$_SESSION['login_user']=$k;
	}
	else
		header("LOCATION:try.php");
    $sql1="SELECT fname from `user` where `email`='$email' and `psw`='$psw'";
    $result1=mysqli_query($conn,$sql1);
    while($row = mysqli_fetch_assoc($result1)) {
        $k=$row["fname"];
    }    
	}else{
		$k=$_SESSION['login_user'];
	}
	if(isset($_GET['sess'])=="logout"){
	session_unset();
		header("location:try.php");}
		
?>
<ul>
		<li><a href="try.php">Home</a></li>
		
		<li class="dropdown" style="float: right;"><a href="#" class="dropbtn"><?php echo "Hi!  ".$k ?><i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
				<a href ="profile.php">My Profile</a>
				<a href ="bookings.php">My Bookings</a>
				<a href ="cancel.php">Cancel Ticket</a>
				<a href ="passenger.php?sess=logout">Sign out</a>

			</div>
		</li>
	</ul>
	<form class="form-content" method="POST" action="ticket.php">
		<div class="container">
			<h2>Enter the passenger details</h2>
			<label for="p_fname"><b>First Name</b></label>
		<input type="text" placeholder="Enter  passenger's First Name" name="p_fname" required >
		<label for="p_lname"><b>Last Name</b></label>
		<input type="text" placeholder="Enter passenger's Last Name" name="p_lname" required >
		<label><b>Gender</b>
		<input type="radio" name="gender" value="male" required >Male
		<input type="radio" name="gender" value="female" required >Female
		<input type="radio" name="gender" value="other" required >Others
	</label><br><br>
		<label for="age"><b>Age</b></label>
		<input type="number" name="age" required >
		<label for="email"><b>Email</b></label>
		<input type="text" placeholder="Enter Email" name="email" required >
	<label for="berth"><b>Berth</b></label>
		<select name="berth">
    <option value="Lower">Lower</option>
    <option value="Middle">Middle</option>
    <option value="Upper">Upper</option>
    <option value="Side Lower">Side Lower</option>
    <option value="Side Upper">Side Upper</option>
		</select>
		<button class="button" style="width: 50%;margin-left:20%">Submit</button>
				</div>
		</form>
		
</body>
</html>