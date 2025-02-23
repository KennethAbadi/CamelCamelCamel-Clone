<?php
if(isset($_GET) && !empty($_GET)) {
    $id = $_GET['id'];
    $con = mysqli_connect('localhost', '60504180','60504180','db_60504180');

    $sql = "SELECT * FROM tracking WHERE id = '$id'";
    
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $clicks = $row['clicks'];
        $clicks = $clicks + 1;
        $sql = "UPDATE tracking SET clicks = '$clicks' WHERE id = '$id'";
    }
    else {
        $sql = "INSERT INTO tracking (id, clicks) VALUES ('$id', '1')";
    }
    if(mysqli_query($con, $sql) == TRUE) {
        echo "<script>console.log('Click added.')</script>";
    }
} else {
    die("Please use a GET method (Bad Navigation) <a href='javascript:history.back()'>Return</a>");
}
?>