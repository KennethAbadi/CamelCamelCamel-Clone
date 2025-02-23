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
$sql = 'SELECT * FROM products WHERE id="'.$id.'"';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of product id 
    $row = mysqli_fetch_assoc($result);  
    echo '<div class="product">
    <img class="imgBox" src="'.$row['image'].'">
    <p>
    <span class="productPrice">$'.$row['price'].'</span>
    </p>
    <a class="linkButton" href="https://fakestoreapi.com">View at &lt;Insert&gt;</a></div>';
    echo '<div class="information">
    <p><span class="productTitle">'.$row['title'].'</span><br>
    '.$row['description'].'</p>
    </div>';
    echo '<div class="review">
    <label for="reviewForm">Write a review:</label>
    <br>
    <form id="reviewForm" action="../review.php" method="post">
    <input type="hidden" name="id" value="'.$id.'">
    <textarea id="reviewBox" name="reviewBox" placeholder="Type Review:" rows="5" cols="55"></textArea>
    <input type="submit" id="submit" onclick="loadReview('.$id.')">
    </form>
    </div>';
  }
$sql = "SELECT * FROM reviews WHERE id='$id' ORDER BY  timestamp DESC LIMIT 1";
$result = $conn->query($sql);
$conn->close();
if($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '<div class="newest">';
    echo 'Latest review: '.$row['review'].'<br>';
    echo 'at time: '.$row['timestamp'];
    echo '</div>';
}
}
else {
    die("Please use a GET method (Bad Navigation) <a href='javascript:history.back()'>Return</a>");
}
?>