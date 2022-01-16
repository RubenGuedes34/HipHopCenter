<?php
use App\Models\Musica;
use App\Models\Artist;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{url('css/homepage.css')}}">



    <title>Hip-hop Center</title>
</head>
<body>
<div class="toggle" onclick="toggleMenu()"></div>
     <div id="mainContainer">


     <div id="navBarContainer">
    <nav class="navBar">

    <div class="group">

        <div class="navItem">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{url('images/HipHopCenter.gif')}}" alt="Logo">
                </a>

        </div>

        <div class="navItem">
                <a href="{{ route('search') }}" class="navItemLink">
                <i class="fas fa-search"></i>
                Search</a>
            </div>

            <div class="navItem">
                <a href="{{ route('home') }}" class="navItemLink">
                    <i class="fas fa-compact-disc"></i>
                    Albuns</a>
            </div>

            <div class="navItem">
                <a href="{{ route('artistas') }}" class="navItemLink">
                <i class="fas fa-microphone"></i>
                    Artists</a>
            </div>

            <div class="navItem">
                <a href="{{ route('yourmusic') }}" class="navItemLink">
                    <i class="fas fa-music"></i>
                    Playlists</a>
            </div>


                        <div class="navItem">
                            <a href="{{ route('settings') }}" class="navItemLink">
                                <i class="fas fa-user"></i>
                                 {{ auth()->user()->name }}</a>
                        </div>
                        <?php
                        if(auth()->user()->type==2){
                        ?>
                     <div class="navItem">
                            <a href="{{ route('adminpage') }}" class="navItemLink">
                                <i class="fas fa-user"></i>
                                 Admin Page</a>
                        </div>
                        <?php
                        }
                        ?>

                        <div class="navItem">
                            <a href="{{ route('usersOnline') }}" class="navItemLink">
                                <i class="fas fa-user"></i>
                                Users Status</a>
                        </div>


                        <div class="navItem">

                            <a class="logout"  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <i class="fas fa-sign-out-alt"></i>
                                            {{ __('Logout') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>



            </div>

        </div>

    </nav>







</div>




</div>
        <div id="mainViewContainer">
            <div id="mainContent">
                <div class="entityInfo">
                    <div class="leftSection">
                        <img src="{{ asset('storage/playlist/HipHopCenterLogo1.png') }}" alt="Capa de Album">
                    </div>

                    <div class="rightSection">
                    {{ $playlist->nome }}
                    <br>
                    <p>{{ $playlist->user->name }}</p>
                    <p><?php $count = $playlist->musica->count();
                        echo $count; ?> songs</p>
                    </div>
                </div>

                <div class="tracklistContainer">
                   <ul class="tracklist">
                       <?php
                       $aux=1;
                       ?>
                        @foreach($playlist->musica as $musica)
                        <?php $songIdArray = $playlist->musica; ?>
                        <li class="tracklistRow">
                            <div class="trackCount">
                                <img src="{{ url('images/play-white.png') }}" alt="Play" class="play" onclick="setTrack({{$musica->id}}, tempPlaylist,true)">
                               <span class="trackNumber">
                                    <?php echo $aux; ?>
                               </span>
                            </div>

                            <div class="trackInfo">
                                <span class="nomeMusica">{{$musica->nome}}</span>
                            </div>



                            <div class="trackDuration">
                                <span class="duration">
                                    {{$musica->duracao}}
                                </span>
                            </div>

                        </li>
                        <?php $aux++; ?>

                        @endforeach

                        <script>
                            var tempSongIds = "<?php echo json_encode($songIdArray); ?>";
                            tempPlaylist = JSON.parse(tempSongIds);
                        </script>

                   </ul>
                </div>

            </div>
        </div>

        <?php
        $resultArray= array();
        ?>
        @foreach($playlist->musica as $musica)
        <?php
        $resultArray[]=$musica->id;
        ?>
        @endforeach

        <?php
        $jsonArray = json_encode($resultArray);
        ?>

        <script>

                $(document).ready(function() {
                    var newPlaylist = <?php echo $jsonArray; ?>;
                    audioElement = new Audio();
                    setTrack(newPlaylist[0], newPlaylist, false);
                    updateVolumeProgressBar(audioElement.audio);

                    $("#aTocarAgoraContainer").on("mousedown touchstart mousemove touchmove",function(e){
                         e.preventDefault();
                    });

                    $(".playbackBar .progressBar").mousedown(function() {
                            mouseDown = true;
                    });

                    $(".playbackBar .progressBar").mousemove(function(e) {
                        if(mouseDown) {
                            timeFromOffset(e, this);
                        }
                    });

                    $(".playbackBar .progressBar").mouseup(function(e) {
                        timeFromOffset(e, this);
                    });


                    $(".volumeBar .progressBar").mousedown(function() {
                            mouseDown = true;
                    });

                    $(".volumeBar .progressBar").mousemove(function(e) {
                        if(mouseDown) {
                            var percentage=e.offsetX / $(this).width();
                            if(percentage >=0 && percentage<=1){
                                audioElement.audio.volume=percentage;
                            }

                        }
                    });

                    $(".volumeBar .progressBar").mouseup(function(e) {
                        var percentage=e.offsetX / $(this).width();
                            if(percentage >=0 && percentage<=1){
                                audioElement.audio.volume=percentage;
                            }
                    });

                    $(document).mouseup(function() {
                        mouseDown = false;
                    });

                });
                function timeFromOffset(mouse, progressBar) {
                    var percentage = mouse.offsetX / $(progressBar).width() * 100;
                    var seconds = audioElement.audio.duration * (percentage / 100);
                    console.log(seconds);
                    audioElement.setTime(seconds);
                }

                function prevSong(){
                    if(audioElement.audio.currentTime >= 3 || currentIndex == 0){
                        audioElement.setTime(0);
                    }else{
                        currentIndex = currentIndex - 1;
                        setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
                    }
                }

                function nextSong(){

                    if(repeat){
                        audioElement.setTime(0);
                        playSong();
                        return;
                    }

                    if(currentIndex == currentPlaylist.lenght - 1){
                        currentIndex = 0;
                    }
                    else{
                        currentIndex++;
                    }

                    var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
                    setTrack(trackToPlay, currentPlaylist, true);
                }

                function setRepeat(){
                    if(repeat){
                        repeat = false;
                        var imageName= "{{ url('images/repeat.png')}}"
                    }else{
                        repeat = true;
                        var imageName= "{{ url('images/repeat-active.png')}}"
                    }

                    $(".controlButton.repeat img").attr("src", imageName);
                }

                function setMute(){
                    if(audioElement.audio.muted){
                        audioElement.audio.muted = false;
                        var imageName= "{{ url('images/volume.png')}}"
                    }else{
                        audioElement.audio.muted = true;
                        var imageName= "{{ url('images/volume-mute.png')}}"
                    }

                    $(".controlButton.volume img").attr("src", imageName);
                }

                function setShuffle() {
                    shuffle = !shuffle;
                    var imageName = shuffle ? "{{ url('images/shuffle-active.png')}}" : "{{ url('images/shuffle.png')}}";
                    $(".controlButton.shuffle img").attr("src", imageName);

                    if(shuffle) {
                        shuffleArray(shufflePlaylist);
                        currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
                    }
                    else {
                        currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id);
                    }
                }

                function shuffleArray(a) {
                    var j, x, i;
                    for (i = a.length; i; i--) {
                        j = Math.floor(Math.random() * i);
                        x = a[i - 1];
                        a[i - 1] = a[j];
                        a[j] = x;
                    }
                }


                function setTrack(trackId, newPlaylist, play) {

                    if(newPlaylist != currentPlaylist) {
                        currentPlaylist = newPlaylist;
                        shufflePlaylist = currentPlaylist.slice();
                        shuffleArray(shufflePlaylist);
	                }

                    if(shuffle == true) {
		                currentIndex = shufflePlaylist.indexOf(trackId);
	                }
	                else {
		                currentIndex = currentPlaylist.indexOf(trackId);
	                }

                    pauseSong();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    });
                    $.post("{{url('ajax/getSongJson')}}",{songId:trackId},function(data){

                        var track=JSON.parse(data);

                        $(".nomeMusica span").text(track[0].nome);

                        $.post("{{url('ajax/getArtistJson')}}",{artistId:track[0].id_artista},function(data){
                            var artist=JSON.parse(data);
                            $(".artistaMusica span").text(artist.nome);

                           });
 	 	                audioElement.setTrack(`{{ asset('storage/path/${track[0].path}')}}`,track);
                        playSong();
                    });

                    if(play){
                        audioElement.play();
                    }

                }
                function playSong() {

                        $(".controlButton.play").hide();
                        $(".controlButton.pause").show();
                        audioElement.play();
                }
                function pauseSong(){
                    $(".controlButton.pause").hide();
                    $(".controlButton.play").show();
                    audioElement.pause();
                }
        </script>


        <div id="aTocarAgoraContainer">

            <div id="aTocarAgoraBar">

                <div id="aTocarAgoraEsquerda">
                    <div class="content">
                        <span class="albumLink">
                            <img src="{{ asset('storage/playlist/HipHopCenterLogo1.png') }}" alt="album" class="albumArtwork">
                        </span>

                        <div class="infoMusica">

                            <span class="nomeMusica">
                                <span></span>
                            </span>
                            <span class="artistaMusica">
                                <span></span>
                            </span>

                        </div>


                    </div>
                </div>

                <div id="aTocarAgoraCentro">

                    <div class="content playerControls">
                        <div class="buttons">
                            <button class="controlButton shuffle" title="Shuffle button" onclick="setShuffle()">
                                <img src="{{ url('images/shuffle.png') }}" alt="shuffle">
                            </button>

                            <button class="controlButton previous" title="Previous button" onclick="prevSong()">
                                <img src="{{ url('images/previous.png') }}" alt="previous">
                            </button>

                            <button class="controlButton play" title="Play button" onclick="playSong()">
                                <img src="{{ url('images/play.png') }}" alt="play">
                            </button>

                            <button class="controlButton pause" title="Pause button" style="display:none" onclick="pauseSong()">
                                <img src="{{ url('images/pause.png') }}" alt="pause">
                            </button>

                            <button class="controlButton next" title="Next button" onclick="nextSong()">
                                <img src="{{ url('images/next.png') }}" alt="next">
                            </button>

                            <button class="controlButton repeat" title="Repeat button" onclick="setRepeat()">
                                <img src="{{ url('images/repeat.png') }}" alt="repeat">
                            </button>
                        </div>

                        <div class="playbackBar">
                            <span class="progressTime current">0.00</span>
                            <div class="progressBar">
                                <div class="progressBarbackground">
                                    <div class="progress">

                                    </div>
                                </div>
                            </div>
                            <span class="progressTime remaining">0.00</span>
                        </div>
                    </div>

                </div>

                <div id="aTocarAgoraDireita">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="Volume button" onclick="setMute()">
                            <img src="{{ url('images/volume.png') }}" alt="volume">
                        </button>

                        <div class="progressBar">
                            <div class="progressBarbackground">
                                <div class="progress">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="{{ asset('js/script.js')   }}"> </script>


        <script>
        function toggleMenu(){
            const menuToggle = document.querySelector('.toggle');
            const navBarContainer = document.querySelector('#navBarContainer');
            menuToggle.classList.toggle('active')
            navBarContainer.classList.toggle('active')
        }
    </script>

</body>

</html>
