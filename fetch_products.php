<?php
if($_SERVER['REQUEST_METHOD'] == "GET") {
$cat = $_GET['category'];
$servername = "localhost";
$username = "60504180";
$password = "60504180";
$database = "db_60504180";
$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
if($cat != 'all') {
    $sql = 'SELECT * FROM products WHERE category="'.$cat.'"';
} else {
    $sql = 'SELECT * FROM products';
}
$result = $conn->query($sql);
$conn->close();
if ($result->num_rows > 0) {
    // output data of each row
    $i = 0;
    echo '<button class="collapse" id="'.($i/5).'" onclick="collapse('.($i/5).')">Row '.(($i/5)+1).': Collapse</button>';
    echo '<div class="productRow" id=row0>';
    while($row = $result->fetch_assoc()) {
        if($i == 5 || $i == 10 || $i == 15) {
            echo '</div>';
            echo '<button class="collapse" id="'.($i/5).'" onclick="collapse('.($i/5).')">Row '.(($i/5)+1).': Collapse</button>';
            echo '<div class="productRow" id=row'.($i / 5).'>';
        }
        if($i == 20) {
            echo '</div>';
        }        
        echo '<div class="product">
        <img class="imgBox" src="'.$row['image'].'">
        <a href="product.php?id='.$row['id'].'&name='.$row['title'].'"><h2 class="productTitle">'.$row['title'].'</h2></a>
        <p>
        <span class="productPrice">$'.$row['price'].'</span>
        <br>
        <span class="listPrice">List Price: TBA</span>
        </p>
        <a class="linkButton" href="https://fakestoreapi.com" onclick="track('.$row['id'].')">View at &lt;Insert&gt;</a></div>';
        $i++;
    }
  } else {
    echo "0 results";
  }
}
else {
    die("Please use a GET method (Bad Navigation) <a href='javascript:history.back()'>Return</a>");
}
?>