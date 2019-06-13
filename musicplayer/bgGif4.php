<?php
    include("includes/includedFiles.php");
?>
<script>
document.getElementById("mainContent").style.padding = "0";
document.getElementById("mainViewContainer").style.paddingBottom = "0";
</script>
<div id="bgGif4">
</div>
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