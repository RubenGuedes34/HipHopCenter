<?php
use App\Models\Musica;
use App\Models\Artist;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{url('css/homepage.css')}}">
    <script src="{{url('js/script.js')}}"> </script> 
   

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
<<<<<<< HEAD
                    updateVolumeProgressBar(audioElement.audio);
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
                            var percentage= e.offsetX/ $(this).width();
                            if(percentage >=0 && percentage <=1){
                                audioElement.audio.volume= percentage;
                            }
                        }
                    });

                    $(".volumeBar .progressBar").mouseup(function(e) {
                        var percentage= e.offsetX/ $(this).width();
                        if(percentage >=0 && percentage <=1){
                            audioElement.audio.volume= percentage;
                        }
                    });

                    $(document).mouseup(function() {
                        mouseDown = false;
                    });
                    
=======
>>>>>>> parent of dd04cb0 (4.3)
                });


                function setTrack(trackId, newPlaylist, play) {

                }

        </script>


        <div id="aTocarAgoraContainer">

            <div id="aTocarAgoraBar">

                <div id="aTocarAgoraEsquerda">
                    <div class="content"> 
                        <span class="albumLink">
                            <img src="https://media-exp1.licdn.com/dms/image/C4D03AQHMSBaUrwLY5w/profile-displayphoto-shrink_800_800/0/1605460001084?e=1645660800&v=beta&t=H5mcF-mMZFrjJ1CLvQjMQ3O1Nb_EnF_xsYBmcKFLYKE" alt="album" class="albumArtwork">
                        </span>

                        <div class="infoMusica">

                            <span class="nomeMusica">
                                <span>Xerecrazy Castle VC</span>
                            </span>

                            <span class="artistaMusica">
                                <span>McLawyer</span>
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

                            <button class="controlButton play" title="Play button">
                                <img src="{{ url('images/play.png') }}" alt="play">
                            </button>

                            <button class="controlButton pause" title="Pause button" style="display:none">
                                <img src="{{ url('images/pause.png') }}" alt="pause">
                            </button>

                            <button class="controlButton next" title="Next button">
                                <img src="{{ url('images/next.png') }}" alt="next">
                            </button>

                            <button class="controlButton repeat" title="Repeat button">
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

                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/script.js')   }}"> </script> 
     
       
</body>

</html>