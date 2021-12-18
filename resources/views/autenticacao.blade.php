<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{url('css/autenticacao.css')}}" />
    <title>Hip-hop Center</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form">
            <h2 class="title">Iniciar Sessão</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" value="Iniciar Sessão" class="btn solid" />
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Regista-te</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="far fa-user"></i>
              <input type="text" placeholder="Primeiro Nome" />
            </div>
            <div class="input-field">
              <i class="far fa-user"></i>
              <input type="text" placeholder="Último Nome" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Registar" />    
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Ainda não fazes parte da nossa comunidade?</h3>
            <p>
            Regista-te na nossa página e desfruta de tudo que o Hip-hop Center tem para te dar!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Registar
            </button>
          </div>
          
          <img src="{{url('images/lebronMusic.png')}}" class="image" alt="Man Listening Good Music" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Já fazes parte da nossa comunidade?</h3>
            <p>
              Não percas tempo! Faz login para desfrutar de todas as features que o Hip-hop Center tem para te dar!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Iniciar Sessão
            </button>
          </div>
          <img src="{{url('images/musicPlayer.png')}}" class="image" alt="Man Listening Good Music" />
        </div>
      </div>
    </div>
    
    <script src="{{url('js/autenticacao.js')}}"> </script>
    
  </body>
</html>