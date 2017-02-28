<?php

include_once("./config/util.php");
$util->require_login();

$songID = $_SESSION['temp'];
$song_title = $util->get_song_title($songID);
$song_artist = $util->get_song_artist($songID);
$song_lyrics = $util->get_song_lyrics($songID);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - view information about the song title, song artist, and song lyrics">
    <meta name="keywords" content="Navigator, song, lyrics, view, song, title, artist, lyrics">
    <meta name="author" content="Jacob Preston">
    <title>Song Information</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>
    
    <main>
        <h2><?php echo $song_title ?></h2>
        <h3><?php echo $song_artist ?></h3>

        <textarea class="lyrics" readonly><?php echo $song_lyrics ?></textarea>
    </main>

    <?php include("./partials/footer.php"); ?>
</body>

</html>