<?php
$email = $_SESSION['email'];
$host = 'localhost';
$dbname = 'db_60504180';
$username = '60504180';
$password = '60504180';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt = $conn->prepare("SELECT profilePic FROM registration WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$path = $stmt->fetch();

echo '<img id="profilePic" src=".'.$path[0].'">';
?>