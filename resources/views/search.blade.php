<?php
use App\Models\Musica;
use App\Models\Artist;
use App\Models\Album;
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
                        <div class="navItem">
                            <a href="{{ route('usersOnline') }}" class="navItemLink">
                                <i class="fas fa-user"></i>
                                Users Status</a>
                        </div>
                        <?php
                        }
                        ?>

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

<?php
if(isset($_GET['term'])) {
    $term=$_GET['term'];
}
else {
	$term = "";
}
?>


<div id="mainViewContainer">
 <div id="mainContent">




<div class="searchContainer">
	<h4>Search for an artist, album or song</h4>
    <form Method="GET">
    <input type="text" name="term" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing...">
    <input type="Submit" value="Search">
    </form>
</div>
        <div class="tracklistContainer">
                    <h2>SONGS</h2>
                   <ul class="tracklist"> 
                        <?php
                          $musicas_array=array();
                        if($term!=""){
                            $musicas_array=Musica::Where('nome', 'ilike', $term . '%')->get();
                            if($musicas_array->isEmpty()) {
                                echo "<span class='noResults'>No songs found matching</span>";  
                            } 
                        }else{
                           echo "<span class='noResults'>No songs found matching</span>";  
                        }
                        ?>                
                        @foreach($musicas_array as $musica)
                        <li class="tracklistRow">
                          <div class="trackInfo">
                                <span class="nomeMusica">{{$musica->nome}} from {{$musica->artista->nome}}</span>
                            </div>

                            <div class="trackDuration">
                                <span class="duration">
                                    {{$musica->duracao}}
                                </span>
                            </div>

                        </li>  
                       
                               
                        @endforeach

                   </ul> 
        </div>
                 <div class="gridViewContainer">
                 <h2>Albuns</h2>
                 <?php
                        $albuns_array=array();
                         if($term!=""){
                            $albuns_array=Album::Where('nome', 'ilike',$term . '%')->get();
                            if($albuns_array->isEmpty()) {
                                echo "<span class='noResults'>No albuns found matching</span>";  
                            } 
                         }else{
                            echo "<span class='noResults'>No albuns found matching</span>";   
                         }
                       
                ?>   
        
                    @foreach($albuns_array as $album)         
                       <div class="gridViewItem">
                            <a href="{{ route('albuns.show',$album->id)}}">                          
                            <img src="{{ asset('storage/capa/'.$album->capa) }}" alt="Capa de Album">                     
                            
                            <div class="gridViewInfo">
                                {{ $album->nome }}
                            </div>
                            </a> 
                        </div>
                    @endforeach
                </div>
                <div class="tracklistContainer">
                    <h2>Artists</h2>
                   <ul class="tracklist"> 
                        <?php
                        $artists_array=array();
                         if($term!=""){
                            $artists_array=Artist::Where('nome', 'ilike', $term . '%')->get();
                            if($artists_array->isEmpty()) {
                                echo "<span class='noResults'>No artists found matching</span>";  
                            }      
                         }else{
                            echo "<span class='noResults'>No artists found matching</span>";   
                         }
                        ?>                
                        @foreach($artists_array as $artist)
                        <li class="tracklistRow">
                          <div class="trackInfo">
                                
                        <span class="nomeMusica"> 
                        <a href="{{ route('artists.show',$artist->id)}}">{{$artist->nome}}</a>
                        </span>
                        
                                
                                
                            </div>
                        </li>  
                       
                               
                        @endforeach

                   </ul> 
        </div>    


</div>

</div>




</body>
