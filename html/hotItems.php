<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pageOutline.css">
    <link rel="stylesheet" href="../assets/fonts/fonts.css">
    <link rel="stylesheet" href="../assets/colors/colors.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="../js/breadcrumb.js" ></script>
    <script> document.addEventListener('DOMContentLoaded', updateBreadcrumb)</script>
    <script src="../js/loadHotProducts.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/collapse.js"></script>
    <title>Hot Items</title>
</head>
    <iframe src='header.php' width=100% frameborder=0 height=91vh></iframe>
    <div id="bread">
        <nav id="breadcrumbs" aria-label="Breadcrumb">test</nav>
    </div>
    <div id="filters">
    <div id="search">
            <label for="searchInput"></label>
            <input id="searchInput" type="text" placeholder="Find Products" onkeyup="search(this.value)">
            <button id="searchButton" type="submit">
                <img id="magGlass" src="../assets/images/magGlass.png" alt="Search">
            </button>
        </div>
        Select Category:
        <br>
        <select name="categories" id="cat" onchange="loadHotProducts(this.value)">
            <option value="all">All</option>
            <option value="men's clothing">Men's Clothing</option>
            <option value="jewelery">Jewelery</option>
            <option value="electronics">Electronics</option>
            <option value="women's clothing">Women's Clothing</option>
        </select>
    </div>
    <div id="main">
        
    </div>
    <iframe src="footer.html" width=100% frameborder=0 height=200vh></iframe>
</body>
</html>
