<?php
use App\Models\Musica;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Playlist;
use App\Models\Genero;
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

</head>
<body>

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
                            <a href="profile.php" class="navItemLink">
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
                    <div class="playlistsContainer">

                    <div class="gridViewContainer">
                        <h2>PLAYLISTS</h2>
                        <div class="buttonItems">
                            <form action="{{ route('playlists.create') }}">
                            <button type="submit" class="button green" >NEW PLAYLIST</button>
                            </form>
                        </div>



                        <?php
                            $id=auth()->user()->id; 
                           $user_playlists= Playlist::where('id_user', '=', $id)->get();
                            ?>
                        
                        <h2>Your Playlists</h2>
                            @foreach($user_playlists as $playlist)
                            <div class='gridViewItem' role='link' tabindex='0'>

                                <div class='playlistImage'>
                                <img src="{{ asset('storage/playlist/HipHopCenterLogo1.png') }}">
                                </div>
                                
                                <div class='gridViewInfo'>
                                {{$playlist->nome}} 
                                </div>
                            <div class='actions'>
                            <form action="{{ route('playlists.destroy',$playlist->id) }}"        method="POST">

                                <a class="btn btn-info" href="{{ route('playlists.play',$playlist->id) }}">Play</a>

                                <a class="btn btn-primary" href="{{ route('playlists.show',$playlist->id) }}">Add Songs</a>
                                
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>

                            </div>
                            @endforeach
                            <?php
                           
                            if(count($user_playlists)==0){
                                echo "<h4>You Dont have Playlists created!</h4>";
                            }  ?>
                            <h2>Community Playlists</h2>
                            <br>
                            <br>
                            <br>
                            @foreach($playlists as $playlist)
                            <div class='gridViewItem' role='link' tabindex='0'>

                                <div class='playlistImage'>
                                <img src="{{ asset('storage/playlist/HipHopCenterLogo1.png') }}">
                                </div>
                                
                                <div class='gridViewInfo'>
                                {{$playlist->nome}}
                                </div>
                            <div class='actions'>
                            <form method="POST">
                            <a class="btn btn-primary">
                                Owner:{{$playlist->user->name}}
                                </a>
                                <a class="btn btn-info" href="{{ route('playlists.play',$playlist->id) }}">Play</a>
                            </div>

                            </div>
                            @endforeach
		



                        </div>

                    </div>


	</div>

</div>
</body>