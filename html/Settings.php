<?php
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('Location: signup.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">

    <link rel="stylesheet" href="../css/Settings.css">
    <link rel="stylesheet" href="../assets/fonts/fonts.css">
    <link rel="stylesheet" href="../assets/colors/colors.css">
    <script src="../js/breadcrumb.js" ></script>
    <script> document.addEventListener('DOMContentLoaded', updateBreadcrumb)</script>
    <title>Profile</title>
</head>
<body>
    <iframe src='header.php' width=100% frameborder=0 height=91vh></iframe>
    <div id="bread">
        <nav id="breadcrumbs" aria-label="Breadcrumb">test</nav>
    </div>
    <div id="main">
        <div class="bodycontent">
            <h1> DromedaryDromedaryDromedary Profile </h1>
            <hr>
            <p> Welcome to your account. Change your profile picture, change your password, or logout. </p>
            <div id="bodyContainer">
            <form id="profilePicture" action="../uploadProfile.php" method="post" enctype="multipart/form-data">
                <h2> Change your profile picture </h2>
                <?php
                include '../php/fetchPic.php';
                ?>
                <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="1000000">
                <input type="file" name="profilePic" id="profilePic">
                <input type="submit">
            </form>
            <form id="changePassword">
                <h2> Change your password </h2>
                <label for="currentPassword"> Current Password </label>
                <input type="password" id="currentPassword" name="confirmPassword" class="formInput">
                <label for="currentPassword"> New Password </label>
                <input type="password" id="currentPassword" name="confirmPassword" class="formInput">
                <label for="currentPassword"> Confirm New Password </label>
                <input type="password" id="currentPassword" name="confirmPassword" class="formInput">
                <input id="passButton" type="submit"  value="Change Password">
            </form>
                <div id="logout">
                    <h2> Logout
                        <form action="../logout.php">
                            <input id="logoutButt" type="submit" value="Logout">
                        </form>
                </div>
            </div>
        </div>

    </div>
    <iframe src="footer.html" width=100% frameborder=0 height=160vh></iframe>
</body>
</html>
