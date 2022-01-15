
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
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61e35012f7cf527e84d256df/1fpfv1ifs';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

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
                
                <h1 class="recomenda">Hip-hop Center recomends</h1>

                <div class="gridViewContainer">
                    @foreach($albuns as $album)         
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