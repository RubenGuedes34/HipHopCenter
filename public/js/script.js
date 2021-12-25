var currentPlaylist = array();
var audioElement;


<<<<<<< HEAD

function formatTime(seconds) {
	var time = Math.round(seconds);
	var minutes = Math.floor(time / 60); //Rounds down
	var seconds = time - (minutes * 60);

	var extraZero = (seconds < 10) ? "0" : "";

	return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
	$(".progressTime.current").text(formatTime(audio.currentTime));
	$(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;
	$(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio){
	var volume = audio.volume * 100;
	$(".volumeBar .progress").css("width", volume + "%");
}

=======
>>>>>>> parent of dd04cb0 (4.3)
function Audio() {

	this.currentlyPlaying;
	this.audio = document.createElement('audio');

<<<<<<< HEAD
	this.audio.addEventListener("canplay", function() {
		//'this' refers to the object that the event was called on
		var duration = formatTime(this.duration);
		$(".progressTime.remaining").text(duration);		
	});

	this.audio.addEventListener("timeupdate", function(){
		if(this.duration) {
			updateTimeProgressBar(this);
		}
	});

	this.audio.addEventListener("volumechange", function(){
		updateVolumeProgressBar(this);
	});

=======
>>>>>>> parent of dd04cb0 (4.3)
	this.setTrack = function(src) {
		this.audio.src = src;
	}

}