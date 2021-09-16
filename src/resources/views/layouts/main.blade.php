<!DOCTYPE html>
  <html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> @yield('titulo') </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js" rel="stylesheet">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <style>
        body{
            background-color:#F3F4F6;
        }
/* label focus color */
.input-field input:focus + label {
   color: grey !important;
 }
 /* label underline focus color */
 .row .input-field input:focus {
   border-bottom: 1px solid grey !important;
   box-shadow: 0 1px 0 0 grey !important
 }
 #chatbox{
   height: 200px;
   overflow:auto;
 }

    </style>
    
<body>

    <nav class="grey">
        <div class="nav-wrapper  container">
          <a href="/" class="brand-logo "><img src="img/logo.png" style="width: 40px;vertical-align: -8px;" alt=""> NoteCode</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down ">
            <li><a href="/chat">Chat</a></li>
            <li><a href="/imagens">Imagens</a></li>
            @auth
            <li><a href="/dashboard">Painel</a></li>
            
              
            <li><a href="/logout" onclick="event.preventDefault();
                document.getElementById('formlogout').submit();">Sair</a></li>
            
            @endauth

            @guest
              <li><a href="/register">Registrar</a></li>
              <li><a href="/login"><i class="material-icons prefix text-darken-2 left">person</i>Login</a></li>
            @endguest
            
          </ul>
        </div>
      </nav>
    <form action="/logout" method="POST" id="formlogout">
      @csrf
    </form>
<main>
<div class="container">
  <div class="row">
    @if(session('msg'))
        <p class="red white-text" id="alert">{{session('msg')}}</p>
    @endif

    @yield('conteudo')
  </div>
</div>
</main>

@stack('scripts')

</body>
<footer>
    
    <div class="row center">
        <div class="col s12 grey">
            LordHoly&copy;
        </div>
    </div>
</footer>
</html>