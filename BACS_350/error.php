<?php

include_once("./config/util.php");

if(isset($_SESSION["error_code"])){
    $error_code = $_SESSION["error_code"]; 
}
else{
    $error_code = "Error code not setup";
}
$util->logout();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - if there is an error you will be redirected here">
    <meta name="keywords" content="Navigator, song, lyrics, error, redirected, code, logged, out">
    <meta name="author" content="Jacob Preston">
    <title>Error</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>

    <main>
        <h2>Error</h2>
        <h3>You were redirected here because of an error</h3>

        <p><?php echo $error_code; ?></p>

        <p><a href="./index.php">Click here to return to index.php</a></p>
    </main>
    
    <?php include("./partials/footer.php"); ?>
</body>

</html>