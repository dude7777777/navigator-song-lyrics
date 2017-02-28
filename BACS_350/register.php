<?php

include_once("./config/util.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - register a new user or admin by filling out the form with firstname, lastname, username, and password">
    <meta name="keywords" content="Navigator, song, lyrics, register, new, user, admin, fill, form, firstname, lastname, username, password">
    <meta name="author" content="Jacob Preston">
    <title>Register</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>

    <main>
        <h2>Welcome new user/admin</h2>
        <h3>Please fill out this form to register</h3>
        
        <form method="POST" action="process_data.php">
            <label>Firstname:&nbsp;</label>
            <input type="text" name="register_firstname" maxlength="15" required />
            <br />
            <br />

            <label>Lastname:&nbsp;&nbsp;</label>
            <input type="text" name="register_lastname" maxlength="15"  required />
            <br />
            <br />

            <label>Username:&nbsp;</label>
            <input type="text" name="register_username" maxlength="25" required />
            <br />
            <br />

            <label>Password:&nbsp;&nbsp;</label>
            <input type="password" name="register_password" maxlength="25" required />
            <br />
            <br />

            <input class="button" type="submit" name="register" value="Register" />
        </form>

    </main>

    <?php include("./partials/footer.php"); ?>    
</body>

</html>