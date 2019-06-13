var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;

$(window).scroll(function() {
    hideOptionsMenu();
});

$(document).click(function(click){
    var target = $(click.target);
    
    if(!target.hasClass("item") && !target.hasClass("optionsButton")){ //if you click on something that isn't 
        hideOptionsMenu();
        
    }
});

$(document).on("change", "select.playlist", function() {
	var select = $(this);
	var playlistId = select.val();
	var songId = select.prev(".songId").val();

	$.post("includes/handlers/ajax/addToPlaylist.php", { playlistId: playlistId, songId: songId})
	.done(function(error) {

		if(error != "") {
			alert(error);
			return;
		}

		hideOptionsMenu();
		select.val("");
	});
});


function openPage(url) {
    
    if(timer != null) {
        clearTimeout(timer);
    }
    
    
    if(url.indexOf("?") == -1) {
        url = url + "?";
    }
        
    var encodedUrl = encodeURI(url +"&userLoggedIn=" + userLoggedIn);
    $("#mainContent").load(encodedUrl);
    $("body").scrollTop(0);
    history.pushState(null, null, url);
}

function createPlaylist() {
	console.log(userLoggedIn);
	var popup = prompt("Please enter the name of your playlist");

	if(popup != null) {

		$.post("includes/handlers/ajax/createPlaylist.php", { name: popup, username: userLoggedIn })
		.done(function(error) {

			if(error != "") {
				alert(error);
				return;
			}

			//do something when ajax returns
			openPage("yourMusic.php");
		});

	}

}
 function newRandPlaylist(){
    $.post("includes/handlers/ajax/getRandPlaylist.php", function(resultArray){
        var parsed = JSON.parse(resultArray);
        setTrack(parsed[0], parsed, true);
        console.log(parsed);
    });
}

function newRandPlaylist2(){
    $.post("includes/handlers/ajax/getRandPlaylist2.php", function(resultArray){
        var parsed = JSON.parse(resultArray);
        setTrack(parsed[0], parsed, true);
        console.log(parsed);
    });
}


function removeFromPlaylist(button, playlistId) {
    
    var songId = $(button).prevAll(".songId").val();
    $.post("includes/handlers/ajax/removeFromPlaylist.php", { playlistId: playlistId, songId: songId })
		.done(function(error) {

			if(error != "") {
				alert(error);
				return;
			}

			//do something when ajax returns
			openPage("playlist.php?id=" + playlistId);
		});
    
}



function deletePlaylist(playlistId) {
	var prompt = confirm("Are you sure you want to delte this playlist?");

	if(prompt == true) {

		$.post("includes/handlers/ajax/deletePlaylist.php", { playlistId: playlistId })
		.done(function(error) {

			if(error != "") {
				alert(error);
				return;
			}

			//do something when ajax returns
			openPage("yourMusic.php");
		});


	}
}


function hideOptionsMenu() {
    
    var menu = $(".optionsMenu");
    if(menu.css("display") != "none") {
        menu.css("display", "none");
    }
    
}

function showOptionsMenu(button) {
    var songId = $(button).prevAll(".songId").val();
    var menu = $(".optionsMenu");
	var menuWidth = menu.width();
    menu.find(".songId").val(songId);

	var scrollTop = $(window).scrollTop(); //Distance from top of window to top of document
	var elementOffset = $(button).offset().top; //Distance from top of document

	var top = elementOffset - scrollTop;
	var left = $(button).position().left;

	menu.css({ "top": top + "px", "left": left - menuWidth + "px", "display": "inline" });

}

function logout() {
    $.post("includes/handlers/ajax/logout.php", function(){
        
        location.reload();
        
    });
}


function updatePassword(oldPasswordClass, newPasswordClass1, newPasswordClass2) {
	var oldPassword = $("." + oldPasswordClass).val();
	var newPassword1 = $("." + newPasswordClass1).val();
	var newPassword2 = $("." + newPasswordClass2).val();

	$.post("includes/handlers/ajax/updatePassword.php", 
		{ oldPassword: oldPassword,
			newPassword1: newPassword1,
			newPassword2: newPassword2, 
			username: userLoggedIn})

	.done(function(response) {
		$("." + oldPasswordClass).nextAll(".message").text(response);
	})

}
function updateEmail(emailClass){
    var emailValue = $("." + emailClass).val();
    $.post("includes/handlers/ajax/updateEmail.php",{
        email: emailValue, username: userLoggedIn})
    .done(function(response){
        $("." +emailClass).nextAll(".message").text(response);
    })
}

function formatTime(seconds) {
    
    var time = Math.round(seconds);
    var minutes = Math.floor(time/60);
    var seconds = time - (minutes * 60);
    var extraZero
    
    if (seconds < 10) {
        extraZero = "0";
    }
    else {
        extraZero = "";
    }
    return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio){
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));
    
    var progress = audio.currentTime / audio.duration * 100;
    $(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio){
    
    var volume = audio.volume * 100;
    $(".volumeBar .progress").css("width", volume + "%");
    
}

function playFirstSong(){
    setTrack(tempPlaylist[0], tempPlaylist, true);
}

function Audio() {

	this.currentlyPlaying; // variable keeps track of currently playing song
	this.audio = document.createElement('audio'); //contain the audio object
    
    this.audio.addEventListener("ended", function(){
        nextSong();
    });
    
    this.audio.addEventListener("canplay", function(){
        var duration = formatTime(this.duration);
        $(".progressTime.remaining").text(duration);
        
        
    });
    
    
    this.audio.addEventListener("timeupdate", function() {
        if(this.duration) {
            updateTimeProgressBar(this);
        }
        
    });
    
    this.audio.addEventListener("volumechange", function(){
       updateVolumeProgressBar(this); 
    });
    

	this.setTrack = function(track) {
		this.currentlyPlaying = track;
		this.audio.src = track.path; //saying the source of this audio is track.path
	}

	this.play = function() {
		this.audio.play(); //plays a song
	}

	this.pause = function() {
		this.audio.pause();
	}
    
    this.setTime = function(seconds) {
       this.audio.currentTime = seconds; 
    }

}

function anxClick() {
    openPage('bgGif.php');
    newRandPlaylist();
}


function depClick() {
    
    newRandPlaylist2();
    openPage('bgGif.php');
    
}

function openNav() {
    document.getElementById("navBarContainer").style.width = "270px";
    
}

function closeNav() {
    document.getElementById("navBarContainer").style.width = "0";
    
}
function changeBgRed() {
    document.body.style.backgroundColor = "#E03131";
}
function changeBgBlue() {
    document.body.style.backgroundColor = "#3B53FF";
}
function changeBgAqua() {
    document.body.style.backgroundColor = "#BDFFF6";
}
function changeBgGreen() {
    document.body.style.backgroundColor = "#4CCD25";
}
function changeBgYellow() {
    document.body.style.backgroundColor = "#F9F94D";
}
function changeBgOrange() {
    document.body.style.backgroundColor = "#FE6A2E";
}
function changeBgPurple() {
    document.body.style.backgroundColor = "#BB29A7";
}
function changeBgPink() {
    document.body.style.backgroundColor = "#FFC0CB";
}
function changeBgIndigo() {
    document.body.style.backgroundColor = "#4B0082";
}
function changeBgOlive() {
    document.body.style.backgroundColor = "#556B2F";
}
