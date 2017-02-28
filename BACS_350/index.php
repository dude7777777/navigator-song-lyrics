<?php

include_once("./config/util.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - welcome to the home page, choose a user or an admin">
    <meta name="keywords" content="Navigator, song, lyrics, welcome, home, index, user, admin, choose">
    <meta name="author" content="Jacob Preston">
    <title>Home</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>

    <main>
        <h2>Welcome</h2>
        <h3>Choose if you are a User or an Admin?</h3>
        
        <form method="POST" action="process_data.php">
            <input class="button" type="submit" name="index_user" value="User">
            <input class="button" type="submit" name="index_admin" value="Admin">
        </form>

    </main>

    <?php include("./partials/footer.php"); ?>
</body>

</html>