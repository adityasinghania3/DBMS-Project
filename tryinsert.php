<!DOCTYPE HTML>
<html>
<body>

<?php 
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$database="railway";
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn)
		die("Connection failed:".mysqli_connect_error());
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$bdate=$_POST['bdate'];
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$sql1="SELECT * from  `user` where `email`='$email'";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0){
		$_SESSION['id2']=1;
		header("location:try.php");
	}
	$sql="INSERT INTO `user`(`fname`, `lname`, `gender`, `bdate`, `email`, `psw`) VALUES ('$fname','$lname','$gender','$bdate','$email','$psw')";
	mysqli_query($conn,$sql);
	if (mysqli_affected_rows($conn)>0) {
		$_SESSION['id1']=1;
		//echo "<script type='text/javascript'>alert(\"user is added\");</script>";
		header("location:try.php");

	}
/*if($conn->query($sql) === TRUE){
		header
}else{
	echo "not added";
}*/
		mysqli_close($conn);

	?>
	<script>

	</script>

</body>
</html>