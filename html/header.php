<?php
session_start();
?>
<head>
    <link rel="stylesheet" href="../assets/fonts/fonts.css">
    <link rel="stylesheet" href="../assets/colors/colors.css">
    <link rel="stylesheet" href="../css/pageOutline.css">
    <script src="../js/burgerMenu.js"></script>
</head>
<header>
    <div class="burger-menu-icon">☰</div>
    <nav class="burger-menu-nav">
    <div id="backButton">☰</div>
        <div class="left">
        <a href="../html/home.php" target="_top">Home</a>
        <a href="../html/hotItems.php" target="_top">Hot Items</a>
        <a href="../html/Settings.php" target="_top">Profile</a>
    </div>
    <div class="vertical-line"></div>
    <div class="right">
        <a href="../html/support.html" target="_top">Contact Us</a>
        <a href="../html/Features.html" target="_top">Features</a>
        <a href="../html/signup.html" target="_top">Login/Signup</a>
    </div>
</nav>
    <a href="../html/home.php" target="_top">
        <div id="imageContainer">
            <img id="logo" src="../assets/images/camel.png" alt="dromedarydromedarydromedary logo">
            <h1 id="pageName">Dromedary<br>Dromedary<br>Dromedary</h1>
        </div>
    </a>
    <div id="mainContent">
    <nav>
        <a class="headerNav" href="home.php" target="_top">Popular Products</a>
        <a class="headerNav" href="hotItems.php" target="_top">Hot Items</a>
    </nav>
    <div id="mainContent">

    <?php
    if(!empty($_SESSION['email']) && isset($_SESSION['email'])) {
        echo '<a href="Settings.php" target="_top"><button id="loginButton">Profile</button></a>';
    }
    else {
        echo '<a href="signup.html" target="_top"><button id="loginButton">Login/Signup</button></a>';
    }
    ?>
        </div>
</header>