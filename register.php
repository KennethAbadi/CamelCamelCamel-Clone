<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
if(isset($_POST['email']))
{

// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', '60504180','60504180','db_60504180');

$password = md5($_POST['password']);
$email = $_POST['email'];

$sql = "CREATE TABLE IF NOT EXISTS registration (
    email VARCHAR(255),
    password VARCHAR(255),
    profilePic BLOB
    )";
if(mysqli_query($con, $sql) == TRUE) {
    echo "<script>console.log('Created table registration')</script>";
}
else {
    die('Failed to create table <a href=html/signup.html>Return to sign up page</a>');
}

// database insert SQL code
$sql = "INSERT INTO `registration` (`email`, `password`) VALUES ( '$email', '$password')";

$select = "SELECT * FROM registration WHERE email = '$email'";
// insert in database 

$result = mysqli_query($con, $select);

if(mysqli_num_rows($result) > 0){
    echo "<p>You are already Registered</p>";
    echo '<a href="html/signup.html"><p>Return to sign in page</p></a>';
}else 
{
    $rs = mysqli_query($con, $sql);
    $con->close();
	header("Location: html/signupValidation.html");
}
}
}
else {
    die("Please use a POST method (Bad Navigation) <a href='javascript:history.back()'>Return</a>");
}
?>