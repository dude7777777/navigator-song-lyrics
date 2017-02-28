<?php

include_once("./config/util.php");

//Array of songIDs
$IDs = $util->get_songIDs();

?>

<table class="songs">
    <tr class="bold">
        <th>Choice</th>
        <th>Title</th>
        <th>Artist</th>
    </tr>

    <?php foreach($IDs as $val){ ?>
        <tr>
            <td class="centered"><input type="radio" name="song" value="<?php echo $val ?>" /></td>
            <td><?php echo $util->get_song_title($val); ?></td>
            <td><?php echo $util->get_song_artist($val); ?></td>
        </tr>
    <?php } ?>
</table>