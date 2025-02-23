<?php
if(isset($_GET) && !empty($_GET)) {
    $id = $_GET['id'];
    $name = $_GET['name'];
}
else {
    die("Bad navigation <br><a href='javascript:history.back()'>Return</a>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pageOutline.css">
    <link rel="stylesheet" href="../assets/fonts/fonts.css">
    <link rel="stylesheet" href="../assets/colors/colors.css">
    <link rel="stylesheet" href="../css/product.css">
    <script src="../js/breadcrumb.js" ></script>
    <script> document.addEventListener('DOMContentLoaded', updateBreadcrumb)</script>
    <script src="../js/loadSingleProduct.js"></script>
    <script src="../js/loadReview.js"></script>
    <title><?php echo $name; ?></title>
</head>
<body>
    <iframe src='header.php' width=100% frameborder=0 height=91vh></iframe>
    <div id="bread">
        <nav id="breadcrumbs" aria-label="Breadcrumb">test</nav>
    </div>
    <div id="main">
        <div class="bodycontent">
            <div id="productInfo">
                <script>loadProduct(<?php echo $id; ?>);</script>
            </div>
        </div>

        <div class="bodycontent">
            <div id="latest">
                
            </div>
        </div>
    </div>
    <iframe src="footer.html" width=100% frameborder=0 height=160vh></iframe>
</body>
</html>
