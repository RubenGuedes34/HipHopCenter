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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{url('css/homepage.css')}}">
   
   

    <title>Hip-hop Center</title>
</head>
<body>
          
     <div id="mainContainer">


        <div id="topContainer">

                <div id="navBarContainer">
                    <nav class="navBar">

                        <div class="group">
                            <div class="navItem">
                                <a href="search.php" class="navItemLink">Search
                                <img src="{{ url('images/search.png') }}" class="icon" alt="Search">
                                </a>
                            </div>

                        </div>

                        <div class="group">
                            <div class="navItem">
                                <a href="browse.php" class="navItemLink">Browse</a>
                            </div>

                            <div class="navItem">
                                <a href="yourMusic.php" class="navItemLink">Your Music</a>
                            </div>

                            <div class="navItem">
                                <a href="profile.php" class="navItemLink">{{ auth()->user()->name }}</a>
                            </div>

                            <div class="navItem">
                            
                                <a class="logout"  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
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
                        <img src="{{ asset('storage/capa/'.$album->capa) }}" alt="Capa de Album">
                    </div>

                    <div class="rightSection">
                    {{ $album->nome }}
                    <br>
                    <p>{{ $album->artista->nome }}</p>
                    <p><?php $count = Musica::where('id_album', $album->id)->count();
                        echo $count; ?> songs</p>
                    </div>
                </div>

                <div class="tracklistContainer">
                   <ul class="tracklist">  
                       <?php
                       $aux=1;
                       ?>                     
                        @foreach($album->musicas as $musica)
                        <li class="tracklistRow">
                            <div class="trackCount">
                                <img src="{{ url('images/play-white.png') }}" alt="Play" class="play">
                               <span class="trackNumber">
                                    <?php echo $aux; ?>
                               </span> 
                            </div>

                            <div class="trackInfo">
                                <span class="nomeMusica">{{$musica->nome}}</span>
                            </div>

                            <div class="trackOptions">
                                <img src="{{ url('images/more.png') }}" alt="Opções" class="optionsButton">
                            </div>

                            <div class="trackDuration">
                                <span class="duration">
                                    {{$musica->duracao}}
                                </span>
                            </div>

                        </li>  
                        <?php $aux++; ?> 
                               
                        @endforeach
                        

                   </ul> 
                </div>

            </div>      
        </div>
        
        <?php
        $resultArray= array();
        ?>
        @foreach($album->musicas as $musica)
        <?php 
        $resultArray[]=$musica->id;
        ?>
        @endforeach

        <?php
        $jsonArray = json_encode($resultArray);
        print_r($jsonArray);
        ?>

        <script>

                $(document).ready(function() {
                    currentPlaylist = <?php echo $jsonArray; ?>;
                    audioElement = new Audio();
                    setTrack(currentPlaylist[0], currentPlaylist, false);
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

                    var trackToPlay = currentPlaylist[currentIndex];
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

                function setTrack(trackId, newPlaylist, play) {

                    currentIndex= currentPlaylist.indexOf(trackId);
                    pauseSong();

                    $.post("{{url('ajax/getSongJson.php')}}",{songId:trackId},function(data){

                        var track=JSON.parse(data);

                        $(".nomeMusica span").text(track.nome);
                        
                        $.post("{{url('ajax/getArtistJson.php')}}",{artistId:track.id_artista},function(data){
                            var artist=JSON.parse(data);
                            $(".artistaMusica span").text(artist.nome);
                         });
                        $.post("{{url('ajax/getAlbunsJson.php')}}",{albunsId:track.id_album},function(data){
                            var album=JSON.parse(data);
                            var capa=`{{ asset('storage/capa/${album.capa}')}}`;
                            $(".albumLink img").attr("src",capa);
                         });

                        
                       
                         
 	 	                audioElement.setTrack(`{{ asset('storage/path/${track.path}')}}`,track);
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
                            <img src="" alt="album" class="albumArtwork">
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
                            <button class="controlButton shuffle" title="Shuffle button">
                                <img src="{{ url('images/shuffle.png') }}" alt="shuffle">
                            </button>

                            <button class="controlButton previous" title="Previous button">
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
                        <button class="controlButton volume" title="Volume button">
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

        
     
       
</body>

</html>