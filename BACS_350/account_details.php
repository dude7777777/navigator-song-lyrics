<?php

include_once("./config/util.php");
$util->require_login();

$first = $util->get_firstname();
$last = $util->get_lastname();
$password = $util->get_password();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - edit account details by changing your firstname, lastname, and password">
    <meta name="keywords" content="Navigator, song, lyrics, account, details, edit, firstname, lastname, password, confirm, changes">
    <meta name="author" content="Jacob Preston">
    <title>Account Details</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>
    
    <main>
        <h2>Account Detials</h2>
        <h3>Edit your firstname, lastname, and password below.</h3>

        <form method="POST" action="./process_data.php">
            <label>Firstname:&nbsp;&nbsp;</label>
            <input type="text" name="edit_firstname" value="<?php echo $first; ?>" required />
            <br />
            <br />

            <label>Lastname:&nbsp;&nbsp;</label>
            <input type="text" name="edit_lastname" value="<?php echo $last; ?>" required />
            <br />
            <br />

            <label>Password:&nbsp;&nbsp;</label>
            <input type="password" name="edit_password" value="<?php echo $password; ?>" required />
            <br />
            <br />

            <input class="button" type="submit" name="edit_account" value="Confirm Changes" />
        </form>
    </main>

    <?php include("./partials/footer.php"); ?>
</body>

</html>