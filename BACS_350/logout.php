<?php

include_once("./config/util.php");
$util->logout();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - logout confimation page when you have been successfully logged out">
    <meta name="keywords" content="Navigator, song, lyrics, logout, logged, out, successfully, success">
    <meta name="author" content="Jacob Preston">
    <title>Logout</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>
    
    <main>
        <h2>Logged Out</h2>
        <h3>You have been successfully logged out</h3>
        <p><a href="./index.php">Click here to return home</a></p>
    </main>

    <?php include("./partials/footer.php"); ?>
</body>

</html>