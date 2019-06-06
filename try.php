<?php
session_start();
if(isset($_SESSION['id1'])==1){
		session_unset('id2');
	echo '<script type="text/javascript">alert("user is added");</script>';
	session_unset('id1');
}
if(isset($_SESSION['id2'])==1){
	session_unset('id1');
	echo '<script type="text/javascript">','alert("Email already exists");','</script>';
	session_unset('id2');

}
	if(isset($_SESSION['login_user']))
    $k=$_SESSION['login_user'];

?>



<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="pro.css">
	<title>Railway</title>
	
</head>
	<body background="7.jpg" class="img" >
	<ul>
		<li><a href="#">Home</a></li>
		<li id="login"  style="float: right;"><a href="#" <?php if (!isset($_SESSION['email'])) echo 'onclick="login()"'; else echo 'style="display:none;"' ?>>Login</a></li>
		<li id="signup" style="float:right;"><a href="#" <?php if (!isset($_SESSION['email'])) echo 'onclick="signup()"'; else echo 'style="display:none;"' ?>>SignUp</a></li>
		<?php if (isset($_SESSION['email'])) {
		echo '<li class="dropdown" style="float: right;"><a href="#" class="dropbtn">'?><?php echo "Hi!  ".$k ?><?php echo '<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
				<a href ="profile.php">My Profile</a>
				<a href ="bookings.php">My Bookings</a>
				<a href ="cancel.php">Cancel Ticket</a>
				<a href ="passenger.php?sess=logout">Sign out</a>
			</div>
		</li>';} ?>
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
  				  <option value="3AC">Third AC</option>  				    				  <option value="2AC">Second AC</option>

  				</select>
 			<label for="quota"><b>Quota</b></label>
			<select name="quota">
   			 <option value="General">General</option>
   			 <option value="Tatkal">Tatkal</option>
   			</select>
   			 <button class="button" style="width: 50%;margin-left:20%">Submit</button>
			</div>
		</form>
	<div id="myModal" class="modal">
		<form class="modal-content animate" method="POST" action="login.php">
			<div class="imgcontainer">
				<span onclick="document.getElementById('myModal').style.display='none'" class="close" title="Close">&times;</span>
		<!add img here>
	</div>
	<div class="container">

		<label for="email"><b>Email</b></label>
		<input type="text" placeholder="Enter Email" name="email" required >
		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw" required>
		<button class="button">Login</button>
		<!remember me check box>
	</div>
		
		<!--<span class="psw"><a href="#">Forgot password?</a></span>-->
		</form>
		</div>
		<div id="myModal1" class="modal">
		<form class="modal-content animate" method="POST" action="tryinsert.php">
			<div class="imgcontainer">
				<span onclick="document.getElementById('myModal1').style.display='none'" class="close" title="Close">&times;</span>
		<!add img here>
	</div>
	<div class="container">
		<label for="fname"><b>First Name</b></label>
		<input type="text" placeholder="Enter First Name" name="fname" required >
		<label for="lname"><b>Last Name</b></label>
		<input type="text" placeholder="Enter Last Name" name="lname" required >
		<label><b>Gender</b>
		<input type="radio" name="gender" value="male" required >Male
		<input type="radio" name="gender" value="female" required >Female
		<input type="radio" name="gender" value="other" required >Others
	</label><br><br>
		<label for="bdate"><b>Birthdate</b></label>
		<input type="date" name="bdate" required >
		<label for="email"><b>Email</b></label>
		<input type="text" placeholder="Enter Email" name="email" required >
		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw" required>
		<button id="myBtn" class="button" onclick="">Signup</button>
		<!remember me check box>
	</div>
	
		</form>
		</div>
	
	<script>
		var modal = document.getElementById('myModal');
		var modal1=document.getElementById('myModal1');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

		function login(){
			modal.style.display="block";
		}
		function signup(){
			modal1.style.display="block"
		}
// When the user clicks anywhere outside of the modal, close it
window.addEventListener("click",function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
/*window.onclick = function(event) {
   if (event.target == modal1) {
        modal1.style.display = "none";
    }
}*/
window.addEventListener("click",function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
});

	</script>
</body>
</html>
