<?php

    include("includes/includedFiles.php");
    

?>
<script>
    document.getElementById("mainContent").style.padding = "0 100px";
    document.getElementById("mainViewContainer").style.paddingBottom = "90px";
</script>

<div class="playlistContainer">
    <div class="gridViewContainer">
        <h2>PLAYLISTS</h2>
        <div class="buttonItem">
            <button class="button" onclick="createPlaylist()">New Playlist</button>
        </div>
        <?php 
        
            $username = $userLoggedIn -> getUsername();
            $playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner ='$username' ");

            if(mysqli_num_rows($playlistsQuery) == 0) {
                echo "<span class='noResults'>No playlists found</span>";
            }
            while ($row =mysqli_fetch_array($playlistsQuery)) {
                $playlist = new Playlist($con, $row);
                
                echo "<div class='gridViewItem' role='link' tabindex='0' onclick = 'openPage(\"playlist.php?id=". $playlist->getId() . "\")'> 
                    
                    <div class='playlistImage'>
                        <img src='assets/images/icons/playlist.png'>
                    </div>
                    
                     <div class='gridViewInfo'>"
                            .  $playlist -> getName() . 
                        "</div>  
                    </div>";
            }
    ?>
    
    
    
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
</div>