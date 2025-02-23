<?php
session_start();
if(!isset($_POST) || empty($_POST)) {
    die("Bad navigation. <a href='javascript:history.back()'>Return</a>");
}
if(!isset($_SESSION) || empty($_SESSION)) {
    die("Please login to leave a review.<br> <a href='html/signup.html'>Login</a> <br> <a href='javascript:history.back()'>Return</a>");
}
if(empty($_POST['reviewBox'])) {
    die("Please enter some text. <br> <a href='javascript:history.back()'>Return</a>");
}
date_default_timezone_set('America/Los_Angeles');
$timestamp = time();
$mytime = date("d-m-Y (D) H:i:s", $timestamp);

$servername = "localhost";
$username = "60504180";
$password = "60504180";
$database = "db_60504180";
$review = $_POST['reviewBox'];
$id = $_POST['id'];

$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO reviews (id, review, timestamp) VALUES ('$id', '$review', '$mytime')";
if($conn->query($sql) == TRUE) {
    echo '<script>console.log("Insert into reviews success")</script>';
}else {
    echo '<script>console.log("Error inserting into reviews: '.$conn->error.'")</script>';
}
header('Location: javascript:history.back()');


?>