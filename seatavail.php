<!DOCTYPE HTML>
<html>
<head>

<style>
#booking{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    margin: 100px auto;

		}
		#booking td, #booking th {
    border: 1px solid black;
    padding: 30px 70px;
    color:black;
    font-size: 20px;
    background-color: rgba(255,255,200,0.5);
}

.img{
		background-size: cover;
	}
#booking th {
       padding: 30px;
    text-align: left;
    background-color: rgba(255,255,10,0.6);
    color: white;
}	

.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
input[type=text],input[type=password] {
    width:100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding: 60px
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin:5% auto 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
}
.container {
    padding: 16px;
}
	ul{
	list-style-type: none;
	margin:0;
	padding: 0;
	background-color: black;
	overflow: hidden;
}
li{
	float: left;
}
li a{
	display: block;
	text-decoration: none;
	text-align: center;
	color:white;
	font-size: 20px;
	padding: 25px 20px
}
li a:hover{
	background-color: grey;
}
</style>
</head>
		<body background="new2b0.jpg" class="img" >

<?php
	 session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$database="railway";
	$k="";
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn)
		die("Connection failed:".mysqli_connect_error());
	$train_no=$_POST['train_no'];
	$src=$_POST['src'];
	$dest=$_POST['dest'];
	$tdate=$_POST['tdate'];
	$class=$_POST['class'];
	$quota=$_POST['quota'];

	$sql="SELECT train.train_no,tname,src_id,dest_id,tdate,avail_3AC,avail_Sleeper FROM `train` natural join `seat_avail` WHERE `tdate`='$tdate' and `src_id`='$src' and `dest_id`='$dest' and train.`train_no`='$train_no'";
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)) {
			$a=$row["train_no"];
			$b=$row["tdate"];
			$c=$row["tname"];
			$d=$row["avail_3AC"];
			$e=$row["avail_Sleeper"];
		}
		if(isset($a)) $_SESSION['train_no']=$a;
		if(isset($b))$_SESSION['tdate']=$b;
		$_SESSION['class']=$class;	
   
	mysqli_close($conn);

?>	
	<ul>
		<li><a href="try.php">Home</a></li>
		<!li id="login"  style="float: right;"><!a href="#" onclick="login()">Login<!/a><!/li>
	</ul>
	<table id="booking">
		<tr>
	<th>Train Number</th>
  <th>travel date</th>
  <th>Train name</th>  
  <th><?php if($class=="Sleeper") echo "Sleeper Availability"; else echo "3AC Availability"; ?></th>
  <th></th>
  <tr> 
  <td><?php if(isset($a)) echo $a; else echo "No data found!!!"; ?></td>
  <td><?php if(isset($b)) echo $b; else echo "" ?></td>
  <td><?php if(isset($c)) echo $c; else echo "" ?></td>  
  <td><?php if(!isset($d)) echo ""; if(!isset($e)) echo ""; if($class=="Sleeper" && isset($e)) echo $e; else{ if(isset($d)) echo $d;} ?></td>
  <td><button <?php if(!isset($_SESSION['email'])){ echo 'onclick="login()" style="background-color:rgba(255,255,255,0.4);font-size: 20px;"';} else { echo 'onclick="login1()" style="background-color:rgba(255,255,20,0.2);font-size: 20px;"';}?>>BOOK</button>
</tr></table>  
<div id="myModal" class="modal">
		<form class="modal-content animate" method="POST" action="passenger.php">
			<div class="imgcontainer">
				<span onclick="document.getElementById(myModal).style.display='none'" class="close" title="Close">&times;</span>
		<!add img here>
	</div>
	<div class="container">
		<label for="email"><b>Email</b></label>
		<input type="text" placeholder="Enter Email" name="email" required >
		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw" required>
		<button class="button">Login</button>
		<!remember me check box>
		<button class="cancelbtn" onclick="signup()"><b>If Not Registed SignUp</b></button>

	</div>
		<!forgot paasword>
		</form>
		
		</div>
		<div id="myModal1" class="modal">
		<form class="modal-content animate" method="POST" action="tryinsert.php" >
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
		function login1(){
			window.location="passenger.php";
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
function book(){
  		window.location.href = "passenger.php";
  	}  	

  </script>



</body>
</html>