<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Admin </title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../assets/fonts/fonts.css">
    <link rel="stylesheet" href="../assets/colors/colors.css">
</head>
<body>
    <div id="main">
        <h1> DromedaryDromedaryDromedary Admin Page </h1>
            <form method="post" action="../php/admin.php">
                <label for="productId" class="formContent"> Remove item by product ID </label>
                <input id="productId" name="productId" type="text" class="formContent"/>
                <button class="formContent" > Delete Product </button>
            </form>
            <br>
            <form method="post" action="../php/admin.php">
                <label for="userEmail" class="formContent"> Remove user by email </label>
                <input id="userEmail" name="userEmail" type="text" class="formContent"/>
                <button class="formContent" > Delete User </button>
            </form>
            <?php
                 $con = mysqli_connect('localhost', '60504180','60504180','db_60504180'); //The Blank string is the password

                $query = "SELECT products.id,title,price,category,clicks FROM products JOIN tracking ON products.id=tracking.id"; //You don't need a ; like you do in SQL
                $result = mysqli_query($con,$query);

                echo "<table>"; // start a table tag in the HTML
                echo "<tr><td>ID</td><td>title</td><td>price</td><td>category</td><td>interactions</td>";
                while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                echo "<tr><td>" . htmlspecialchars($row['id']) . "</td><td>" . htmlspecialchars($row['title']) . "</td><td>" 
                . htmlspecialchars($row['price']) . "</td><td>"
                . htmlspecialchars($row['category']) . "</td><td>"
                . htmlspecialchars($row['clicks']) . "</td></tr>";  //$row['index'] the index here is a field name
                }

                echo "</table>"; //Close the table in HTML

                mysqli_close($con); //Make sure to close out the database connection
            ?>
           
    </div>
    <a href="../html/home.php">
        <button> Back to home page</button>
    </a>
</body>
</html>