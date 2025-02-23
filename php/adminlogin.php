<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
	$servername = "localhost";
	$username = "60504180";
	$password = "60504180";
	$database = "db_60504180";
	$conn = new mysqli($servername, $username, $password, $database);
	if($conn->connect_error) {
	    die("connection failed: " . $conn->connect_error);
	}

	$password = $_POST['password'];
	$email = $_POST['empEmail'];

	$select = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";

	$result = mysqli_query($conn, $select);
	
	if(mysqli_num_rows($result) > 0){
		header("Location: ../admin/admin.php");
	} else{
		echo 'wrong credentials';
	}
	
}
else {
	die("Please use a POST method (Bad Navigation)");
}
?>