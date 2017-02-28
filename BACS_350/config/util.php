<?php

class Util{

    public function __construct(){     
        session_start();
        if(!isset($_SESSION["status"])){
            $_SESSION["status"] = false;
        }
    }

    //Used if a page needs someone logged in to access
    public function require_login(){
        if($_SESSION["status"] == false) {
            header("location: ./error.php");
            $_SESSION["error_code"] = "You must be logged in to access that";
            exit;
        }
    }

    //Connect to Database
    public function connect(){
        $username = 'root';
        $password = '';

        try {
            $db = new mysqli("localhost", $username, $password, "songlyrics");
            $_SESSION["db"] = $db;
        } catch (Exception $e) {
            $_SESSION["error_code"] = "Database error";
            header("location: ./error.php");
            exit();
        }
    }

    //Register functions
    public function register_admin($first, $last, $username, $password){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "INSERT INTO admins VALUES (\"\", \"$first\", \"$last\", \"$username\", \"$password\");";
        $results = $db->query($sql);

        if($results){
            mysqli_close($db);
            return true;
        }
        else{
            mysqli_close($db);
            return false;
        }
    }
    public function register_user($first, $last, $username, $password){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "INSERT INTO users VALUES (\"\", \"$first\", \"$last\", \"$username\", \"$password\");";
        $results = $db->query($sql);

        if($results){
            mysqli_close($db);
            return true;
        }
        else{
            mysqli_close($db);
            return false;
        }
    }

    //Log in/out functions
    public function login_admin($username, $password){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "SELECT username, password, adminID from admins where username = \"$username\" and password = \"$password\";";
        $results = $db->query($sql);

        $rows = $results->fetch_assoc();

        if($rows > 0){
            $_SESSION["id"] = $rows["adminID"];
            mysqli_close($db);
            $_SESSION["status"] = true;
            return true;
        }
        else{
            mysqli_close($db);
            return false;
        }
    }
    public function login_user($username, $password){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "SELECT username, password, userID from users where username = \"$username\" and password = \"$password\";";
        $results = $db->query($sql);

        $rows = $results->fetch_assoc();

        if($rows > 0){
            $_SESSION["id"] = $rows["userID"]; 
            mysqli_close($db);
            $_SESSION["status"] = true;
            return true;
        }
        else{
            mysqli_close($db);
            return false;
        }
    }
    public function logout(){
        session_unset();
        $_SESSION["status"] = false;
    }

    //Admin functions
    public function create_song($title, $artist, $lyrics){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "INSERT INTO songs VALUES (\"\", \"$title\", \"$artist\", \"$lyrics\");";

        $results = $db->query($sql);

        if($results){
            mysqli_close($db);
            return true;
        }
        else {
            mysqli_close($db);
            return false;
        }
    }
    public function edit_song($songID, $title, $artist, $lyrics){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "UPDATE songs SET Title = \"$title\", Artist = \"$artist\", Lyrics = \"$lyrics\" WHERE songID = $songID;";

        $results = $db->query($sql);

        if($results){
            mysqli_close($db);
            return true;
        }
        else {
            mysqli_close($db);
            return false;
        }
    }    
    public function delete_song($songID){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "DELETE FROM songs WHERE songID = \"$songID\";";

        $results = $db->query($sql);

        if($results){
            mysqli_close($db);
            return true;
        }
        else {
            mysqli_close($db);
            return false;
        }
    }

    //Song functions
    public function get_songIDs(){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "SELECT songID from songs;";
        $results = $db->query($sql);

        $stack = array();

        while($rows = $results->fetch_assoc()){
            $stack[] =$rows["songID"];
        }

        mysqli_close($db);
        return $stack;
    }
    public function get_song_title($songID){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "SELECT Title from songs where songID = $songID;";
        $results = $db->query($sql);

        $rows = $results->fetch_assoc();
        $title = $rows["Title"];

        mysqli_close($db);
        return $title;
    }
    public function get_song_artist($songID){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "SELECT Artist from songs where songID = $songID;";
        $results = $db->query($sql);

        $rows = $results->fetch_assoc();
        $artist = $rows["Artist"];
        
        mysqli_close($db);        
        return $artist;
    }
    public function get_song_lyrics($songID){
        $conn = $this->connect();
        $db = $_SESSION["db"];

        $sql = "SELECT Lyrics from songs where songID = $songID;";
        $results = $db->query($sql);

        $rows = $results->fetch_assoc();
        $lyrics = $rows["Lyrics"];
        
        mysqli_close($db);
        return $lyrics;
    }

    //Edit account detail functions
    public function get_firstname(){
        $conn = $this->connect();
        $db = $_SESSION["db"];
        $id = $_SESSION["id"];

        if(strcmp($_SESSION["client_type"], "admin")==0){
            $sql = "SELECT firstname from admins where adminID = $id;";
        }
        else {
            $sql = "SELECT firstname from users where userID = $id;";
        }
        $results = $db->query($sql);

        $rows = $results->fetch_assoc();
        $firstname = $rows["firstname"];
        
        mysqli_close($db);
        return $firstname;
    }
    public function get_lastname(){
        $conn = $this->connect();
        $db = $_SESSION["db"];
        $id = $_SESSION["id"];

        if(strcmp($_SESSION["client_type"], "admin")==0){
            $sql = "SELECT lastname from admins where adminID = $id;";
        }
        else {
            $sql = "SELECT lastname from users where userID = $id;";
        }

        $results = $db->query($sql);

        $rows = $results->fetch_assoc();
        $lastname = $rows["lastname"];
        
        mysqli_close($db);
        return $lastname;
    }
    public function get_password(){
        $conn = $this->connect();
        $db = $_SESSION["db"];
        $id = $_SESSION["id"];

        if(strcmp($_SESSION["client_type"], "admin")==0){
            $sql = "SELECT password from admins where adminID = $id;";
        }
        else {
            $sql = "SELECT password from users where userID = $id;";
        }

        $results = $db->query($sql);

        $rows = $results->fetch_assoc();
        $password = $rows["password"];
        
        mysqli_close($db);
        return $password;
    }
    public function edit_account($firstname, $lastname, $password){
        $conn = $this->connect();
        $db = $_SESSION["db"];
        $id = $_SESSION["id"];

        if(strcmp($_SESSION["client_type"], "admin")==0){
            $sql = "UPDATE admins SET firstname = \"$firstname\", lastname = \"$lastname\", password = \"$password\" WHERE adminID = $id;";
        }
        else {
            $sql = "UPDATE users SET firstname = \"$firstname\", lastname = \"$lastname\", password = \"$password\" WHERE userID = $id;";
        }

        $results = $db->query($sql);

        if($results){
            mysqli_close($db);
            return true;
        }
        else {
            mysqli_close($db);
            return false;
        }
    }
}

$util = new Util();

?>