<?php

include_once("./config/util.php");

?>

<nav>
    <!-- HOME TAB -->
    <?php if(isset($_SESSION["status"]) && $_SESSION["status"]==true && strcmp($_SESSION["client_type"], "admin")==0) { ?>
        <div class="tab"><a href="./admin_home.php">Home</a></div>
    <?php } elseif(isset($_SESSION["status"]) && $_SESSION["status"]==true && strcmp($_SESSION["client_type"], "user")==0) { ?>
        <div class="tab"><a href="./user_home.php">Home</a></div>
    <?php } else { ?>
        <div class="tab"><a href="./index.php">Home</a></div>
    <?php } ?>

    <!-- LOGOUT TAB -->
    <?php if(isset($_SESSION["status"]) && $_SESSION["status"]==true){ ?>
        <div class="tab"><a href="./account_details.php">Edit Account</a></div>
        <div class="tab right"><a href="./logout.php">Logout</a></div>
    <?php } ?>

</nav>