<?php

include_once("./config/util.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - please login using the from with your username and password">
    <meta name="keywords" content="Navigator, song, lyrics, login, form, username, password">
    <meta name="author" content="Jacob Preston">
    <title>Login</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>
    
    <main>
        <h2>Please Login</h2>

        <form method="POST" action="./process_data.php">
            <label class="label">Username:&nbsp;</label>
            <input type="text" name="login_username" maxlength="25" required />
            <br />
            <br />

            <label class="label">Password:&nbsp;&nbsp;</label>
            <input type="password" name="login_password" maxlength="25" required />
            <br />
            <br />

            <input class="button" type="submit" name="login" value="Login" />
        </form>

        <p><a href="./register.php">Need to register? Click Here</a></p>
    </main>

    <?php include("./partials/footer.php"); ?>
</body>

</html>