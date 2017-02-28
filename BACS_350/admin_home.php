<?php

include_once("./config/util.php");
$util->require_login();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Navigator song lyrics - welcome to the song list for admins. Choose a song to view, edit, or delete it or create a new song">
    <meta name="keywords" content="Navigator, song, lyrics, welcome, home, admin, songs, view, edit, create, delete">
    <meta name="author" content="Jacob Preston">
    <title>Home - Admin</title>
    <link href="./styles/basic_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include("./partials/header.php"); ?>
    <?php include("./partials/menu_bar.php"); ?>
    
    <main>
        <h2>Welcome, Admin</h2>
        <h3>Song List</h3>
        <p>Choose a song to view, edit, or delete it. <br />
        Or click "Create Song" to create a new song.</p>

        <content>
            <form method="POST" action="./process_data.php">
                <div class="centered">
                    <?php include("./partials/songs.php") ?>
                    <input class="button" type="submit" name="admin_view" value="View Song" />                    
                    <input class="button" type="submit" name="admin_edit" value="Edit Song" />
                    <input class="button" type="submit" name="admin_create" value="Create Song" />
                    <br />
                    <br />
                    <input class="button red_button" type="submit" name="admin_delete" value="Delete Song" />
                </div>
            </form>
        </content>
    </main>

    <?php include("./partials/footer.php"); ?>
</body>

</html>