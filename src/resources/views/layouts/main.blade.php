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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/highlight.min.js"></script>
    <!-- and it's easy to individually load additional languages -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/languages/go.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.14.0/devicon.min.css">
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
@stack('styles')
<body>

    <nav class="white">
        <div class="nav-wrapper  container">
          <a href="/" class="brand-logo grey-text"><img src="img/logo.png" style="width: 40px;vertical-align: -8px;" alt=""> NoteCode</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down ">
            @auth
            <!-- <li><a class="grey-text" href="/user/profile"><i class="material-icons">manage_accounts</i></a></li> -->
            
              
            <li><a class="grey-text" href="/logout" onclick="event.preventDefault();
                document.getElementById('formlogout').submit();">Sair</a></li>
            
            @endauth
            
          </ul>
        </div>
      </nav>
    <form action="/logout" method="POST" id="formlogout">
      @csrf
    </form>
<main>
<div class="container">
  <div class="row">
    <div class="row" style="margin-top: 20px;">

        <div class="col s2 center" style="margin: 5px;">
            <a href="" class="btn-flat grey lighten-1 white-text"><i class="material-icons">post_add</i></a>
            <h6 class="grey-text" style="font-size: 12px">Novo Código</h6>
        </div>
        <div class="col s2 center" style="margin: 5px;">
            <a href="" class="btn-flat grey lighten-1 white-text"><i class="material-icons">public</i></a>
            <h6 class="grey-text" style="font-size: 12px">Códigos Públicos</h6>
        </div>
        <div class="col s2 center" style="margin: 5px;">
            <a href="" class="btn-flat grey lighten-1 white-text"><i class="material-icons">code</i></a>
            <h6 class="grey-text" style="font-size: 12px">Meus Códigos</h6>
        </div>
    
    </div>

    @if(session('msg'))
        <p class="red white-text" id="alert">{{session('msg')}}</p>
    @endif

    @yield('conteudo')
  </div>
</div>
</main>

@stack('scripts')
<script>hljs.initHighlightingOnLoad();

    /*document.querySelectorAll("code").forEach(function(element) {
        element.innerHTML = element.innerHTML.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    });
    */</script>
</body>
<footer>
    <!--
    <div class="row center">
        <div class="col s12 grey">
            LordHoly&copy;
        </div>
    </div>

    -->
</footer>
</html>