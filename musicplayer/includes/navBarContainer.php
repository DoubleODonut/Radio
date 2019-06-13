<div id="navBarContainer">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <nav class="navBar">
        <span class="logo">
            <img src="assets/images/icons/logo-01.png">
        </span>
        <div class="group">
            <div class="navItem">
                 <span role="link" tabindex="0" onclick="openPage('search.php'); closeNav()" class="navItemLink">Search
                    <img src="assets/images/icons/search.png" class="icon" alt="search">
                 </span>
            </div>
        </div>

        <div class="group">
            <div class="navItem borderBottom">
                 <span role="link" tabindex="0" onclick="openPage('browse.php'); closeNav()" class="navItemLink">Browse Music
                    <img src="assets/images/icons/browse-grey.png" class="iconBrowse" alt="browse">
                 </span><p>
                 <span role="link" tabindex="0" onclick="openPage('yourMusic.php'); closeNav()" class="navItemLink">Your Music
                     <img src="assets/images/icons/playlist-grey.png" class="iconPlaylist" alt="playlist">
                </span></p><p>
                 <span role="link" tabindex="0" onclick="openPage('settings.php'); closeNav()" class="navItemLink"><?php echo $userLoggedIn->getFirstAndLastName(); ?></span><img src="assets/images/icons/profile-grey.png" class="iconProfile" alt="profile"></p>
                <span role="link" tabindex="0" onclick="openPage('disclaimer.php'); closeNav()" class="navItemLink">Disclaimer
                     <img src="assets/images/icons/disclaimer-grey.png" class="iconDisclaimer" alt="playlist">
                </span></p>
            </div>
            <div class="navItem">
                <span>Select Station</span><p>
                <span onclick="newRandPlaylist(); closeNav()" class="navItemLink">Anxiety
                 </span></p><p>
                 <span onclick="newRandPlaylist2(); closeNav()" class="navItemLink">Depression
                </span></p>
                
            </div>  
            <div class="navItem">
                <span>Animated Wallpapers</span>
            </div>    
            <div class="gridViewItemNav"> 
                    
                    <div class='navImage'  onclick="openPage('bgGif.php'); closeNav()">
                        <img src='assets/images/bgGif.png'>
                    </div>
                    <div class='navImage'  onclick="openPage('bgGif2.php'); closeNav()">
                        <img src='assets/images/bgGif2.png'>
                    </div>
                     <div class='navImage'  onclick="openPage('bgGif3.php'); closeNav()">
                        <img src='assets/images/bgGif3.png'>
                    </div>
                    <div class='navImage'  onclick="openPage('bgGif4.php'); closeNav()">
                        <img src='assets/images/bgGif4.png'>
                    </div>
                 </div>
                <div class="gridViewItemNav"> 
                    <div class='navImage'  onclick="openPage('bgGif5.php'); closeNav()">
                        <img src='assets/images/bgGif5.png'>
                    </div>
                     <div class='navImage'  onclick="openPage('bgGif6.php'); closeNav()">
                        <img src='assets/images/bgGif6.png'>
                    </div>
                    <div class='navImage'  onclick="openPage('bgGif7.php'); closeNav()">
                        <img src='assets/images/bgGif7.png'>
                    </div>
                    <div class='navImage'  onclick="openPage('bgGif8.php'); closeNav()">
                        <img src='assets/images/bgGif8.png'>
                    </div>
                 </div>
                <div class="gridViewItemNav"> 
                     <div class='navImage'  onclick="openPage('bgGif9.php'); closeNav()">
                        <img src='assets/images/bgGif9.png'>
                    </div>
                    <div class='navImage'  onclick="openPage('bgGif10.php'); closeNav()">
                        <img src='assets/images/bgGif10.png'>
                    </div>
                 </div>
            <div class="navItem">
                <span>Colours</span>
            </div>
                <div class="gridViewItemNav">
                    <div id='navImageBlue'  onclick="changeBgBlue(); closeNav()">
                    </div>
                    <div id='navImageAqua'  onclick="changeBgAqua(); closeNav()">
                    </div>
                    <div id='navImageRed'  onclick="changeBgRed(); closeNav()">
                    </div>
                    <div id='navImageGreen'  onclick="changeBgGreen(); closeNav()">
                    </div>
                    <div id='navImageYellow'  onclick="changeBgYellow(); closeNav()">
                    </div>
                    <div id='navImageOrange'  onclick="changeBgOrange(); closeNav()">
                    </div>
                    <div id='navImagePurple'  onclick="changeBgPurple(); closeNav()">
                    </div>
            </div>
            
            <div class="gridViewItemNav">
    
                    <div id='navImagePink'  onclick="changeBgPink(); closeNav()">
                    </div>
                    <div id='navImageIndigo'  onclick="changeBgIndigo(); closeNav()">
                    </div>
                    <div id='navImageOlive'  onclick="changeBgOlive(); closeNav()">
                    </div>
            </div>
        </div>
    </nav>


    </div>