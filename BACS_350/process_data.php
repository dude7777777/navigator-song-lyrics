<?php

include_once("./config/util.php");

// Set Client Type varibale and redirect to login form page
if(isset($_POST["index_admin"])){
    $_SESSION["client_type"] = "admin";
    header("location: ./login_form.php");
    exit;
}
elseif(isset($_POST["index_user"])){
    $_SESSION["client_type"] = "user";
    header("location: ./login_form.php");
    exit;
}

// If POST data comes from login page, try and login and redirect to admin/user home page
if(isset($_POST["login"])){
    if(isset($_POST["login_username"]) && isset($_POST["login_password"])){
        $username = $_POST["login_username"];
        $password = $_POST["login_password"];

        //login as admin
        if(strcmp($_SESSION["client_type"], "admin") == 0 && $util->login_admin($username, $password)){
            header("location: ./admin_home.php");
            exit;
        }
        //login as user
        elseif(strcmp($_SESSION["client_type"], "user") == 0 && $util->login_user($username, $password)){
            header("location: ./user_home.php");
            exit;
        }
        else{
            header("location: ./error.php");
            $_SESSION["error_code"] = "Login error";
            exit;
        }
    }
    else{
        header("location: ./error.php");
        $_SESSION["error_code"] = "Both username and password fields are required to login";
        exit;
    }
}

// If POST data comes from register page redirect to login page
if(isset($_POST["register"])){
    //check if post data is set else redirect to error page
    if(isset($_POST["register_firstname"]) && isset($_POST["register_lastname"]) && isset($_POST["register_username"]) && isset($_POST["register_password"])){
        $first = $_POST["register_firstname"];
        $last = $_POST["register_lastname"];
        $username = $_POST["register_username"];
        $password = $_POST["register_password"];
    }
    else{
        header("location: ./error.php");
        $_SESSION["error_code"] = "All fields are required to register: firstname, lastname, username, and password";
        exit;
    }

    //Register admin
    if(strcmp($_SESSION["client_type"], "admin")==0){
        if($util->register_admin($first, $last, $username, $password)){
            header("location: ./login_form.php");
            exit;
        }    
        else{
            header("location: ./error.php");
            $_SESSION["error_code"] = "Registration was unsuccessful";
            exit;
        }
    }

    //Register user
    elseif(strcmp($_SESSION["client_type"], "user")==0){
        if($util->register_user($first, $last, $username, $password)){
            header("location: ./login_form.php");
            exit;
        }
        else{
            header("location: ./error.php");
            $_SESSION["error_code"] = "Registration was unsuccessful";
            exit;
        }
    }

    else{
        header("location: ./error.php");
        $_SESSION["error_code"] = "Registration was unsuccessful";
        exit;
    }
}

//If POST data is to view song information
if((isset($_POST["user_view"]) || isset($_POST["admin_view"])) && isset($_POST["song"])){
    $_SESSION["temp"] = $_POST["song"];
    header("location: ./view_song.php");
    exit;
}
elseif(isset($_POST["user_view"]) || isset($_POST["admin_view"])) {
    if(strcmp($_SESSION["client_type"], "admin")==0){
        header("location: ./admin_home.php");
        exit;        
    }
    elseif(strcmp($_SESSION["client_type"], "user")==0){
        header("location: ./user_home.php");
        exit;
    }
}

//If POST data is to edit account information
if(isset($_POST["edit_account"])){
    $firstname = $_POST["edit_firstname"];
    $lastname = $_POST["edit_lastname"];
    $password = $_POST["edit_password"];

    //If successfully updated then redirect to admin home
    if($util->edit_account($firstname, $lastname, $password)){
        if(strcmp($_SESSION["client_type"], "admin")==0){
            header("location: ./admin_home.php");
            exit;
        }
        //If successfully updated then redirect to user home
        else if(strcmp($_SESSION["client_type"], "user")==0){
            header("location: ./user_home.php");
            exit;
        }
        else {
            header("location: ./error.php");
            $_SESSION["error_code"] = "Error when trying to update your account settings";
            exit;
        }
    }
    else {
        header("location: ./error.php");
        $_SESSION["error_code"] = "Error when trying to update your account settings";
        exit;
    }

}

//If POST data is to edit song details
if(isset($_POST["edit_song"])){
    $songID = $_SESSION["temp"];
    $title = $_POST["edit_title"];
    $artist = $_POST["edit_artist"];
    $lyrics = $_POST["edit_lyrics"];

    if($util->edit_song($songID, $title, $artist, $lyrics)){
        //If successfully edited song details redirect to admin home
            header("location: ./admin_home.php");
            exit;
    }
    else{
        header("location: ./error.php");
        $_SESSION["error_code"] = "Error when trying to edit song information";
        exit;
    }
}

//If POST data is to create a new song
if(isset($_POST["admin_create"])){
    header("location: ./create_song.php");
    exit;
}
if(isset($_POST["create_song"])){
    $title = $_POST["create_title"];
    $artist = $_POST["create_artist"];
    $lyrics = $_POST["create_lyrics"];

    if($util->create_song($title, $artist, $lyrics)){
        header("location: ./admin_home.php");
        exit;
    }
    else{
        header("location: ./error.php");
        $_SESSION["error_code"] = "Error when trying to create a song";
        exit;      
    }
}

//If POST data is to edit a song
if(isset($_POST["admin_edit"]) && isset($_POST["song"])){
    $_SESSION["temp"] = $_POST["song"];
    header("location: ./edit_song.php");
    exit;
}
elseif(isset($_POST["admin_edit"])){
    header("location: ./admin_home.php");
    exit;
}

//If POST data is to delete a song
if(isset($_POST["admin_delete"]) && isset($_POST["song"])){
    $songID = $_POST["song"];

    if($util->delete_song($songID)){
        header("location: ./admin_home.php");
        exit;
    } else {
        header("location: ./error.php");
        $_SESSION["error_code"] = "Error when trying to delete a song";
        exit;      
    }
}
elseif(isset($_POST["admin_delete"])){
    header("location: ./admin_home.php");
    exit;
}

// If there is an error redirect to error page
else{
    header("location: ./error.php");
    $_SESSION["error_code"] = "Unexpeted error";
    exit;
}

?>