@extends('layouts.main')
@section('titulo', "Notecode")
@push('styles')
    <style>
        .coments, .coment{
            margin: 5px;
            padding-top: 25px;
        }
        .comentDate{
            font-size: 12px;
            color: dimgray
        }
    </style>

@endpush

@section('conteudo')

    <div class="col s12">
        <h5><i class="devicon-{{$getNote->language}}-plain"></i> {{$getNote->title}} </h5>
        <span class="datapost"><i> Postado: {{$getNote->created_at->format('d/m/Y - H:i')}} - <b>{{$getNote->user->name}}</b></i> </span>
        <pre><code class="grey lighten-2 z-depth-2 " id="codeblockk{{$getNote->id}}">{{$getNote->notecode}}</code></pre>
        <div class="col s12" style="text-align: right;">
            <a  class="btn-flat grey lighten-2 grey-text bntActions" onclick="copyToClipboard({{$getNote->id}})"><i class="material-icons">content_copy</i></a>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <hr>
            Comentários:
        </div>
    </div>

        <div id="comentlist">
            @foreach ($getNote->coments as $coment)
                    <div class="col s11 push-s1 z-depth-2 grey lighten-2 coments">
                        <spam class="coment"> <b>{{$coment->user}}: </b>   {{$coment->coment}}</spam> <span class='right comentDate'>{{$coment->created_at->format('d/m/Y - H:i')}}
                        @if ($coment->user==auth()->user()->name)
                        <a href="" onclick="event.preventDefault();
                        document.getElementById('deletecoment{{$getNote->id}}').submit();"><i class="material-icons" style="vertical-align: -6px; color: dimgray" >delete</i></a>

                        <form action="/coment-delete/{{$coment->id}}/viewing-note/{{$getNote->id}}" method="post" id="deletecoment{{$getNote->id}}">
                            @csrf
                            @method('delete')
                        </form>

                        @endif</span>
                    </div>
            @endforeach
        </div>


    <div class="row">
        <div class="col s7 push-s1 input-field" >
            <input type="text" class="comentarioInput" name="comentFF" placeholder="Novo comentário" id="comentarioInput">
        </div>
        <div class="col s1 push-s1 " style="padding-top: 25px;">
            <a  onclick="comentar({{$getNote->id}},document.getElementById('comentarioInput').value)"><i class="material-icons left grey-text">send</i></a>
        </div>
    </div>

@endsection



@push('scripts')
    <script>
        function comentar(id,coment){
                //comentar-note/{id}/coment/{coment}',
        var url = '/comentar-note/'+id+'/coment/'+coment;
        var comentList = document.getElementById('comentlist');
        var usuario = "{{auth()->user()->name}}"

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", url, true);

            //Função a ser chamada quando a requisição retornar do servidor
        xhttp.onreadystatechange = function(){
            //Verifica se o retorno do servidor deu certo
            if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
                M.toast({html: 'Comentário enviado!',classes: 'green darken-4 white-text'});
                document.getElementById('comentarioInput').value = '';
                comentList.innerHTML +='<div class="col s11 push-s1 z-depth-2 grey lighten-2 coments"><spam class="coment"> <b>'+usuario+': </b>'+coment+'</spam></div>';

            }
        }

        xhttp.send();//A execução do script CONTINUARÁ mesmo que a requisição não tenha retornado do servidor
    }


    //copy to clipboard
    function copyToClipboard(id) {
        var copyText = document.getElementById("codeblockk"+id).innerText;
        navigator.clipboard.writeText(copyText);
        M.toast({html: 'Código Copiado!'})
    }

        document.getElementById("comentarioInput").addEventListener('keypress', function (e) {
        var key = e.which || e.keyCode;
            var comentario = document.getElementById('comentarioInput').value;

                if (key === 13) {
                    if (comentario != ''){
                    comentar({{$getNote->id}},comentario);
                    }else{
                    M.toast({html: 'Comentário em branco!', classes: 'red darken-4 white-text'});
                    }
                }
            }
        );

    </script>
@endpush
