<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = 'localhost';
    $dbname = 'db_60504180';
    $username = '60504180';
    $password = '60504180';

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    if(!empty($_POST['productId']) && isset($_POST['productId'])) {
        $item = 'id';
        $toRemove = $_POST['productId'];
        $table = 'products';
    }
    if(!empty($_POST['userEmail']) && isset($_POST['userEmail'])) {
        $item = 'email';
        $toRemove = $_POST['userEmail'];
        $table = 'registration';
        $stmt = $conn->prepare("SELECT profilePic FROM registration WHERE $item = :toRemove");
        $stmt->bindParam(':toRemove', $toRemove);
        $stmt->execute();
        $path = $stmt->fetch();
        unlink(".".$path[0]);
    }
    $stmt = $conn->prepare("DELETE FROM $table WHERE $item = :toRemove");
    $stmt->bindParam(':toRemove', $toRemove);

    if ($stmt->execute()) {
        echo "Deleted successfully.";
    } else {
        echo "An error occurred while deleting";
    }
}
else {
    die("Please use a POST method (Bad Navigation)");
}
?>
