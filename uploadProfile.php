<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST") {
$email = $_SESSION['email'];

$con = mysqli_connect('localhost', '60504180','60504180','db_60504180');

$validExt = array("jpg", "png");
$validMime = array("image/jpeg", "image/png");
$max_file_size = 1000000;
foreach($_FILES as $fileKey => $fileArray) {
    if($fileArray['size'] > $max_file_size) {
        die("Error: $fileKey is too big");
    }
    printf("%s is %.2f KB", $fileKey, $fileArray["size"]/1024);
}
foreach($_FILES as $fileKey => $fileArray) {
    $extension = end(explode(".", $fileArray['name']));
    if(in_array($fileArray["type"],$validMime) && in_array($extension, $validExt)) {
        echo "<script>console.log('valid extension and mime')</script>";
    }
    else {
        die('invalid extension/mime<a href=html/signup.html>Return to sign up page</a>');
    }
}
$fileToMove = $_FILES['profilePic']['tmp_name'];
$destination = "./images/".$email.".".$extension;
if(move_uploaded_file($fileToMove, $destination)) {
    echo "<script>console.log('The file was uploaded and moved successfully!')</script>";
}
else {
    echo "<script>console.log('There was a problem moving the file')</script>";
}
$sql = "UPDATE `registration` SET profilePic = '$destination' WHERE email = '$email'";

if(mysqli_query($con, $sql) == TRUE) {
    header('Location: html/Settings.php');
}
}
else {
    die("Please use a POST method (Bad Navigation) <a href='javascript:history.back()'>Return</a>");
}
?>