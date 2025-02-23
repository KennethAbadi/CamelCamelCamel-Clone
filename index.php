<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once 'fetch_products.php';
    $result = fetchAllProducts();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["price"]. "<br>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
    ?>
</body>
</html>