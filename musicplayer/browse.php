<?php
include("includes/includedFiles.php");
?>
<script>
    document.getElementById("mainContent").style.padding = "0 100px";
    document.getElementById("mainViewContainer").style.paddingBottom = "90px";
</script>

<h1 class="pageHeadingBig">Browse the Music of Each Station</h1>
<div class="gridViewContainer">
    <?php 
        $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND()");
        
        while ($row =mysqli_fetch_array($albumQuery)) {
            echo "<div class='gridViewItem'>
                 <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
                    <img src='" . $row['artworkPath'] . "'>
                    <div class='gridViewInfo'>"
                        .  $row['title'] . 
                    "</div>
                </span>    
                </div>";
        }
    ?>
</div>

                    