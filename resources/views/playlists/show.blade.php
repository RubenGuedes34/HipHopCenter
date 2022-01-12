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
    

    <title>Hip-hop Center</title>
</head>
<body>
    
<div id="mainContainer">

 <div id="topContainer">


 <div class="toggle" onclick="toggleMenu()"></div>
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
                
            <?php   
            if(isset($_GET['id'])){
            $musica=$_GET['id'];
            $playlist->musica()->attach($musica);   
            }

            if(isset($_GET['remid'])){
                $musica=$_GET['remid'];
                $playlist->musica()->detach($musica);   
                }
                
            ?>

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

<?php  if(count($playlist->musica)!=0){ ?>
    <table class="addSongst1">
        <thead>  
            <tr class="addSongst1head">
                <th>Name</th>
                <th>Likes</th>
                <th>Duration</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Genre</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($playlist->musica as $musica)      
            <tr>
                <td>{{ $musica->nome }}</td>
                <td>{{ $musica->Likes }}</td>
                <td>{{ $musica->duracao }}</td>
                <td>{{ $musica->artista->nome }}</td>
                <td>{{ $musica->album->nome }}</td>
                <td>{{ $musica->genero->nome }}</td>
            
                <td>
                    <form method="GET">
                        @csrf                
                        <button type="submit" value="{{ $musica->id }}" class="button" name="remid">REMOVE</button>
                    </form>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <?php }else{
         echo "<h4>No Songs added to your playlist! Add some bellow</h4>";
    } ?>

<h3>Hip-hop Center recomends:</h3>
<table>
    <thead>
    <tr class="addSongst1head">
        <th>Name</th>
        <th>Likes</th>
        <th>Duration</th>
        <th>Artist</th>
        <th>Album</th>
        <th>Genre</th>
        <th>Action</th>
    </tr>    
    </thead>
    
    <tbody>
    @foreach ($musicas as $musica)
    <tr>
        <td>{{ $musica->nome }}</td>
        <td>{{ $musica->Likes }}</td>
        <td>{{ $musica->duracao }}</td>
        <td>{{ $musica->artista->nome }}</td>
        <td>{{ $musica->album->nome }}</td>
        <td>{{ $musica->genero->nome }}</td>
        <td>
            <form method="GET">
                @csrf                
                <button type="submit" value="{{ $musica->id }}" class="button green" name="id">ADD</button>
            </form>    
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="paginacaoFeira addSongs">
{{$musicas->appends(['musicas'=> $musicas->currentPage()])->links("pagination::bootstrap-4") }}  
</div>
 
  
            </div>
        </div>


        
    </div>

    
 
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