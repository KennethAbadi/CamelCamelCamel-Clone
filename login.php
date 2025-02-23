<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST") {
if(isset($_POST['logemail']))
{
	// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
	$con = mysqli_connect('localhost', '60504180','60504180','db_60504180');

	$password = md5($_POST['loginpassword']);
	$email = $_POST['logemail'];

	$select = "SELECT * FROM registration WHERE email = '$email' && password = '$password' ";

	$result = mysqli_query($con, $select);
	
	if(mysqli_num_rows($result) > 0){
		$_SESSION['id'] = session_id();
		$_SESSION['email'] = $email;
		header("Location: html/home.php");
	}
	else {
		echo '<p>Invalid login</p><a href=html/signup.html><p>Return to sign up page</p></a>';
	}
}
}
else {
	die("Please use a POST method (Bad Navigation) <a href='javascript:history.back()'>Return</a>");
}
?>