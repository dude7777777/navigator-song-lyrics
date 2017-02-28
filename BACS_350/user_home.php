<?php

include_once("./config/util.php");
$util->require_login();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - welcome to the song list for users. Choose a song to view its information">
    <meta name="keywords" content="Navigator, song, lyrics, welcome, home, user, song, list, view, information">
    <meta name="author" content="Jacob Preston">
    <title>Home - User</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>
    
    <main>
        <h2>Welcome, User</h2>
        <h3>Song List</h3>
        <p>Choose a song and click view song</p>

        <content>
            <form method="POST" action="./process_data.php">
                <div class="centered">
                    <?php include("./partials/songs.php") ?>
                    <input class="button" type="submit" name="user_view" value="View Song" />
                </div>
            </form>
        </content>        
    </main>

    <?php include("./partials/footer.php"); ?>
</body>

</html>