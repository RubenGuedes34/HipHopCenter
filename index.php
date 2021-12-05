<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    

    <link rel="stylesheet" type="text/css" href="assets/index.css">

    <title>Hip-hop Center</title>
</head>
<body>

    <section>
        <div class="topBar">
            
            <div class="logo-hiphopcenter">
                <img src="assets/images/HipHopCenterLogo1.png" alt="HipHopCenterLogo">    
            </div>
        
            <div class="btn-grad">
                Iniciar Sessão
            </div>
        
        </div>
    </section>
   
    <section>
        <div class="slogan">
        <h1 class="titulo">
            Obtenha o entretenimento de áudio
            <br>
            que não requer qualquer esforço.
            <br>
            Só no Hip-hop Center.
        </h1>
        </div>
    </section>

    <section id="carousel">

    
        <div class="slider owl-carousel">
            <div class="card">
                <div class="img"><img src="assets/images/2pac.jpg" alt="2PAC"></div>
                <div class="content">
                    <div class="title">Diversas músicas dos teus artistas de HipHop preferidos.</div>
                    <p>Com milhares de músicas, lançamentos exclusivos e diversos géneros de Rap, o HipHopCenter aproxima-te dos teus rappers favoritos. Completamente sem anúncios. </p>          
                </div>
            </div>

            <div class="card">
                <div class="img"><img src="assets/images/biggie.jpg" alt="2PAC"></div>
                <div class="content">
                    <div class="title">A qualquer momento. Em qualquer lugar.</div>
                    <p>Ouve quando quiseres e em qualquer dispositivo, quer estejas na rua, em casa ou no carro.</p>          
                </div>
            </div>

            <div class="card">
                <div class="img"><img src="assets/images/mobbdeep.webp" alt="2PAC"></div>
                <div class="content">
                    <div class="title">Playlists exclusivas.</div>
                    <p>Ouve playlists originais escolhidas a dedo pela nossa equipa de especialistas e playlists especiais criadas pelos artistas de HipHop que mais gostas.</p>          
                </div>
            </div>

        </div>

    </section>
        

    
    <section id="typeOfuser">
        <div class="slogan">
            <h1 class="titulo">
                Deixa que o Hip-hop Center seja a banda sonora da tua <br> vida.
            </h1>
        </div>

        <main class="cards">
        
            <section class="card standard">
                <div class="icon">
                    <img src="assets/images/user2.png" alt="user">
                </div>
                <h3>Standard</h3>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                <button>Saiba mais</button>
            </section>
            <section class="card premium">
                <div class="icon">
                    <img src="assets/images/user.png" alt="user">
                </div>
                <h3>Premium</h3>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                <button>Saiba mais</button>
            </section>
        </main>

    </section>
        
        



    <script>
         $(".slider").owlCarousel({
           loop: true,
           autoplay: true,
           autoplayTimeout: 2000, //2000ms = 2s;
           autoplayHoverPause: true,
         });
    </script> 

</body>
</html>