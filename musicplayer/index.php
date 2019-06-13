<?php
include("includes/includedFiles.php");
?>
        <body>
<script>
document.getElementById("mainContent").style.padding = "0";
document.getElementById("mainViewContainer").style.paddingBottom = "0";
$("#nowPlayingBarContainer").css("visibility", "hidden");
$("#sideButtons").css("visibility", "hidden");
</script>
            <div class="disclaimer">
                <h1>Disclaimer</h1>
                <p>This website uses the concept of Music Therapy in order to help listerners with any anxiety/depression they might currently be suffering from. <br><br>
                Music Therapy is the use of music and musical elements such as dancing/singing/playing an instrument and listening to music. Music is used because of how it can be used as a distraction, or as a way to help people restore there mental state.<br><br>
                On this website you have two options of music that can help you with either afflicion, if you are suffering from <b>Anxiety</b> then I would suggest the anxiety playlist which features music to soothe and to aid in distracting you, helping to stop yur mind being so anxious. 
                <br><br>
                The other playlist is the <b>Depression</b> playlist which consists of light and uplifting music in order to raise spirits and arouse your brain into being more positive.<br><br>
                Some of the content used in this website is not mine, and I would like to say that I do not own anything and the sources to any wallpaper or song I use will be given on a seperate page.
                <br><br>
                Now without further Ado,
                </p>
                <div class="indexLinks">
                    <h4>Tune In to a Station</h4>
                    <div class="dep"  onclick="depClick()"><h2>Depression</h2></div>
                    <div class="anx"  onclick="anxClick()"><h2>Anxiety</h2></div>
                
                </div>
            </div>
            <div id="bgIndex"></div>