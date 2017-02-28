<?php

include_once("./config/util.php");
$util->require_login();
$songID = $_SESSION["temp"];
$song_lyrics = $util->get_song_lyrics($songID);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - edit the song information with a title, artist, and lyrics">
    <meta name="keywords" content="Navigator, song, lyrics, song, information, title, artist, lyrics, admin, confirm, changes">
    <meta name="author" content="Jacob Preston">
    <title>Edit Song Information</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>

    <main>
        <h2>Edit Song</h2>
        <h3>Edit the song information below with a title, artist, and lyrics</h3>
        
        <form method="POST" action="process_data.php">
            <label>Title:&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="edit_title" maxlength="50" value="<?php echo $util->get_song_title($songID); ?>" required />
            <br />
            <br />

            <label>Artist:&nbsp;</label>
            <input type="text" name="edit_artist" maxlength="50" value="<?php echo $util->get_song_artist($songID); ?>" required />
            <br />
            <br />

            <label>Lyrics:</label>
            <textarea class="lyrics" name="edit_lyrics"><?php echo $song_lyrics ?></textarea>
            <br />
            <br />

            <input class="button" type="submit" name="edit_song" value="Confirm Changes" />
        </form>

    </main>

    <?php include("./partials/footer.php"); ?>    
</body>

</html>