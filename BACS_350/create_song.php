<?php

include_once("./config/util.php");
$util->require_login();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - create a new song with its title, artist, and lyrics">
    <meta name="keywords" content="Navigator, song, lyrics, create, song, new, title, artist, lyrics, creation, admin">
    <meta name="author" content="Jacob Preston">
    <title>Create Song</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>

    <main>
        <h2>New Song</h2>
        <h3>Please fill out this form with the title, artist, and lyrics to complete song creation</h3>
        
        <form method="POST" action="process_data.php">
            <label>Title:&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="create_title" maxlength="50" required />
            <br />
            <br />

            <label>Artist:&nbsp;</label>
            <input type="text" name="create_artist" maxlength="50" required />
            <br />
            <br />

            <label>Lyrics:</label>
            <textarea class="lyrics" name="create_lyrics" maxlength="1000" required></textarea>
            <br />
            <br />

            <input class="button" type="submit" name="create_song" value="Create" />
        </form>

    </main>

    <?php include("./partials/footer.php"); ?>    
</body>

</html>