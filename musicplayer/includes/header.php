<?php
include("includes/config.php");
include("includes/classes/User.php");
include("includes/classes/Artist.php"); 
include("includes/classes/Album.php");
include("includes/classes/Song.php");
include("includes/classes/Playlist.php");
//session_destroy();
    if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
        $username = $userLoggedIn->getUsername();
        echo "<script> userLoggedIn = '$username';</script>";
    }
else {
    header ("Location: register.php");
}
?>
<html>
    <head>
        <title>Music Player</title>
	   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/js/script.js"></script>
    </head>
    <body>
        <script>
        var audioElement = new Audio();
        audioElement.setTrack("");
        
        
        
        </script>
        </div>
<div id="sideButtons">
<div class="sidebarButtonMenu">
        <img src="assets/images/icons/menu.png" onclick="openNav()">
</div>
<div class="sidebarButtonBrowse">
        <img src="assets/images/icons/browse.png" onclick="openPage('browse.php')">
</div>
<div class="sidebarButtonPlaylist">
        <img src="assets/images/icons/playlistSide.png" onclick="openPage('yourMusic.php')">
</div>
<div class="sidebarButtonProfile">
        <img src="assets/images/icons/profile.png" onclick="openPage('settings.php')">
</div>
<div class="sidebarButtonDisclaimer">
        <img src="assets/images/icons/disclaimer.png" onclick="openPage('disclaimer.php')">
</div>
</div>
        <div id ="mainContainer">
        
            <div id="topContainer">
                <?php include("includes/navBarContainer.php"); ?>
                <div id="mainViewContainer">
                    <div id="mainContent">
                        