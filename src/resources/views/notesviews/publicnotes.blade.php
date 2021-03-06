@extends('layouts.main')
@section('titulo', "Notecode")

@push('styles')
    <style>
        .datapost{
            font-size: 12px;
        }
        .coments, .coment{
            margin: 5px;
            padding-top: 25px;
        }

        .comentar{

        border-style:groove;
        border-color: grey;
    
        }

     </style>
@endpush

@section('conteudo')
<div class="row">
    <div class="col s12 center">
        <h4>Códigos da comunidade</h4>
    </div>
</div>
@foreach ($AllNotes  as $notes)
    <div class="row">
    <div class="col s12" id="post{{$notes->id}}">
            <h5><i class="devicon-{{$notes->language}}-plain"></i> {{$notes->title}} </h5>
            <span class="datapost"><i> Postado: {{$notes->created_at->format('d/m/Y - H:i')}} - <b>{{$notes->user->name}}</b></i> </span>
        <pre><code class="grey lighten-2 z-depth-2 codeblock" id="codeblock{{$notes->id}}">{{$notes->notecode}}</code></pre>         
        
        <div class="col s12" style="text-align: right;">
            <a  class=" btn-flat grey lighten-2 grey-text bntActions" onclick="copyToClipboard({{$notes->id}})"><i class="material-icons">content_copy</i></a>
        </div>


    </div>
    @php
    $cont = 0;
    @endphp
             <div class="col s12 push-s1">
                Comentários:
            </div>
        
   <!-- FOR EACH PARA COMENTARIOS  IF CONT !=0 -->
    <div id="comentlist{{$notes->id}}">
        @foreach ($notes->coments as $coment)
            @php
            $cont++;
            @endphp
            

                @if ($cont<=4)
                
                    <div class="col s11 push-s1 z-depth-2 grey lighten-2 coments">
                        <spam class="coment"> <b>{{$coment->user}}:</b>   {{$coment->coment}}</spam>
                    </div>
                
                @endif
            
        @endforeach
    </div>
    @if ($cont>4)
        <div class="col s12 push-s1 left">
            <a href="/shownote/{{$notes->id}}" class="">Ver todos os {{$cont}} comentários... </a>
        </div>
    @endif
    <!-- FORM PARA -->
    <div class="row">
            <div class="col s7 push-s1 input-field" id="comentar{{$notes->id}}">
                <input type="text" class="comentarioInput" name="comentFF" placeholder="Novo comentário" id="comentario{{$notes->id}}">
            </div>
            <div class="col s1 push-s1 " style="padding-top: 25px;">
                <a href="#post{{$notes->id}}" onclick="comentar({{$notes->id}},document.getElementById('comentario{{$notes->id}}').value)"><i class="material-icons left grey-text">send</i></a>
            </div>
    </div>
    
    </div>
<hr>
@endforeach


@endsection 

@push('scripts')
<script>
    function copyToClipboard(id) {
      /* Get the text field */
      var copyText = document.getElementById("codeblock"+id).innerText;
    
      navigator.clipboard.writeText(copyText);
    
      M.toast({html: 'Código Copiado!'})
    }

    function comentar(id,coment){
                //comentar-note/{id}/coment/{coment}',
        var url = 'comentar-note/'+id+'/coment/'+coment;
        var comentList = document.getElementById('comentlist'+id);
        var usuario = "{{$loggedUser}}"

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", url, true);

            //Função a ser chamada quando a requisição retornar do servidor
        xhttp.onreadystatechange = function(){
            //Verifica se o retorno do servidor deu certo
            if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
                comentList.innerHTML +='<div class="col s11 push-s1 z-depth-2 grey lighten-2 coments"><spam class="coment"> <b>'+usuario+': </b>'+coment+'</spam></div>';
                document.getElementById('comentario'+id).value = '';
                M.toast({html: 'Comentário enviado!',classes: 'green darken-4 white-text'});

            }
        }

        xhttp.send();//A execução do script CONTINUARÁ mesmo que a requisição não tenha retornado do servidor
    }
    
    @foreach ($AllNotes  as $notes)

        document.getElementById("comentario{{$notes->id}}").addEventListener('keypress', function (e) {
        var key = e.which || e.keyCode;
            var comentario = document.getElementById('comentario{{$notes->id}}').value;
            
                if (key === 13) {
                    if (comentario != ''){
                    comentar({{$notes->id}},comentario);
                    }else{
                     M.toast({html: 'Comentário em branco!', classes: 'red darken-4 white-text'});
                    }
                }
            }
        );
    @endforeach
</script>
@endpush
