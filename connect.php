<?php
    $servername = "localhost";
    $username = "60504180";
    $password = "60504180";
    $database = "db_60504180";
function connect() {   
    echo "Run"; 
    $conn = new mysqli($servername, $username, "", $database);
    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
}
?>