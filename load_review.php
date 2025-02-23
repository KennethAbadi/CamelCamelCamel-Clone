<?php
if($_SERVER['REQUEST_METHOD'] == "GET") {
$id = $_GET['id'];
$servername = "localhost";
$username = "60504180";
$password = "60504180";
$database = "db_60504180";
$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
$sql = 'SELECT * FROM reviews WHERE id="'.$id.'"';
$result = $conn->query($sql);
$conn->close();
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    echo 'Latest review: '.$row['review'].'<br>';
    echo 'at time: '.$row['timestamp'];
        
    }
  } else {
    echo "0 results";
  }
else {
  die("Please use a GET method (Bad Navigation) <a href='javascript:history.back()'>Return</a>");
}
?>