<?php
$servername = "localhost";
$username = "60504180";
$password = "60504180";
$database = "db_60504180";

$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
$sql = "USE ".$database;
if($conn->query($sql) == TRUE) {
    echo '<script>console.log("Connected to '.$database.'")</script>';
}
else {
    echo '<script>console.log("Failed to connect to '.$database.' error: '.$conn->error.'")</script>';
}
$sql = "DROP TABLE IF EXISTS products";
if($conn->query($sql) == TRUE) {
    echo '<script>console.log("Table products dropped")</script>';
}
else {
    echo '<script>console.log("Error dropping table products: '.$conn->error.'")</script>';
}
$sql = "CREATE TABLE products (
    id INT(10),
    title VARCHAR(255),
    price DECIMAL(10,2),
    description VARCHAR(1023),
    category VARCHAR(255),
    image VARCHAR(255),
    rating DECIMAL(1,1),
    count INT(10)
)";
if($conn->query($sql) == TRUE) {
    echo '<script>console.log("Table products dropped")</script>';
}else {
    echo '<script>console.log("Error creating table products: '.$conn->error.'")</script>';
}

$sql = "CREATE TABLE IF NOT EXISTS admin (
    email VARCHAR(255),
    password VARCHAR(255)
)";
if($conn->query($sql) == TRUE) {
    echo '<script>console.log("Table admin initialized")</script>';
}else {
    echo '<script>console.log("Error initializing table admin: '.$conn->error.'")</script>';
}
$select = 'SELECT * FROM admin WHERE email = "admin@email.com" AND password = "60504180"';
$result = $conn->query($select);
if(mysqli_num_rows($result) == 0) { 
    $sql = 'INSERT INTO admin (email, password) VALUES ("admin@email.com", "60504180")';
    if($conn->query($sql) == TRUE) {
        echo '<script>console.log("Insert into admin success")</script>';
    }else {
        echo '<script>console.log("Error inserting into admin: '.$conn->error.'")</script>';
    }
}
$sql = "CREATE TABLE IF NOT EXISTS tracking (
    id INT(10),
    clicks INT(10)
)";
if($conn->query($sql) == TRUE) {
    echo '<script>console.log("Table tracking initialized")</script>';
}else {
    echo '<script>console.log("Error initializing table tracking: '.$conn->error.'")</script>';
}
$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(10),
    review VARCHAR(1023),
    timestamp VARCHAR(255)
)";
if($conn->query($sql) == TRUE) {
    echo '<script>console.log("Table reviews initialized")</script>';
}else {
    echo '<script>console.log("Error initializing table reviews: '.$conn->error.'")</script>';
}


include_once 'grab_data.php';
foreach($data as $item) {
    $sql = 'INSERT INTO products (id, title, price, description, category, image, rating, count) VALUES ("'.$item['id'].'", "'.$item['title'].'", "'.$item['price'].'", "'.$item['description'].'", "'.$item['category'].'", "'.$item['image'].'", "'.$item['rating']['rate'].'", "'.$item['rating']['count'].'")';
    if($conn->query($sql) == TRUE) {
        echo '<script>console.log("Inserted '.$item['id'].' successfully.")</script>';
}
    else {
        echo '<script>console.log("Error inserting '.$item['id'].' error: '.$conn->error.'")</script>';
    }
}
$conn->close();
?>
