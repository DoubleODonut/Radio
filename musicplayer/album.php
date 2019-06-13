<?php include("includes/includedFiles.php");

if(isset($_GET['id'])) {
    $albumId = $_GET['id'];
}
else {
    header("location: index.php");
}

$album = new Album($con, $albumId);;
?>

<script>
    document.getElementById("mainContent").style.padding = "0 100px";
    document.getElementById("mainViewContainer").style.paddingBottom = "90px";
</script>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album ->getArtworkPath(); ?>">
    
    
    
    </div>
    <div class="rightSection">
        <h2><?php echo $album->getTitle(); ?></h2>
        <p><?php echo $album->getNumberOfSongs();?> songs</p>
    
    
    
    
    </div>


</div>

<div class="trackListContainer">
    <ul class="trackList">

        <?php $songIdArray = $album->getSongIds();
            $i=1;
            foreach ($songIdArray as $songId) {
                
                $albumSong = new Song($con, $songId);
               // $albumArtist = $albumSong->getArtist();
                echo "<li class= 'tracklistRow'>
                        <div class='trackCount'>
                        <img class = 'play' src='assets/images/icons/play-white.png' onclick = 'setTrack(\"" . $albumSong -> getId() . "\", tempPlaylist, true)'>
                        <span class='trackNumber'>$i</span> 
                        
                        </div>
                        <div class='trackInfo'>
                            <span class='trackName'>" .  $albumSong->getTitle() . "</span>
                            
                        </div>
                        <div class='trackOptions'>
                            <input type='hidden' class='songId' value = '" . $albumSong->getId() . "'>
                            <img class='optionsButton' onclick='showOptionsMenu(this)' src='assets/images/icons/more.png'>
                        </div>
                        <div class='trackDuration'>
                            <span class='duration'>" .  $albumSong->getDuration() . "</span>
                        </div>
                        
                        
                        
                        </li>";
                $i = $i + 1;
                    
            }
        ?>
        <script>
        
        var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
        tempPlaylist = JSON.parse(tempSongIds);
        
        </script>
        
    
    </ul>
</div>
<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>