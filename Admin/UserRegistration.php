<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
	include 'DatabaseConfig.php';

	$con=mysqli_connect($HostName,$HostUser,$HostPassword,$DatabaseName);

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	$checkSQL="SELECT * FROM users WHERE email='$email'";

	$check=mysqli_fetch_array(mysqli_query($con,$checkSQL));

	if(isset($check)){

		echo 'Email already exists';

	}
	else{
		$insert="INSERT INTO users (fname,lname,email,pass) VALUES ('$fname','$lname','$email','$pass')";

		if(mysqli_query($con,$insert))
		{
			echo "Registration Successful";
		}
		else{
			echo "invalid credetials";
		}
	}
}
mysqli_query($con);
?>