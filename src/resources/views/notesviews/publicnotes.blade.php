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
        <h4>Codigos da comunidade</h4>
    </div>
    
</div>
@foreach ($AllNotes  as $notes)
    <div class="row">
    <div class="col s12">
            <h5><i class="devicon-{{$notes->language}}-plain"></i> {{$notes->title}} </h5>
            <span class="datapost"><i> Postado: {{$notes->created_at->format('d/m/Y - H:i')}} - <b>{{$notes->user->name}}</b></i> </span>
        <pre><code class="grey lighten-2 z-depth-2 codeblock" id="codeblock{{$notes->id}}">{{$notes->notecode}}</code></pre> 

    </div>
    @php
    $cont = 0;
    @endphp
             <div class="col s12 push-s1">
                Comentários:
            </div>

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
    @if ($cont>=4)
        <div class="col s12 push-s1 left">
            <a href="" class="">Ver todos os {{$cont}} comentários... </a>
        </div>
    @endif
    <div class="row">

            <div class="col s7 push-s1 input-field" id="comentar{{$notes->id}}">
                <input type="text" class="" name="comentario" placeholder="Novo comentário" id="comentario{{$notes->id}}">
            </div>
            <div class="col s1 push-s1 " style="padding-top: 25px;">
                <a href=""><i class="material-icons left grey-text">send</i></a>
            </div>
    </div>
    
    </div>
<hr>
@endforeach

@endsection 


@push('scripts')
<script>

    function comentar(id,coment){

            document.getElementById("resposta"+modal).innerHTML = '<img src="img/ajax-loader-onwhite.gif">';

            var url = 'comentar-note/'+id+'/coment/'+coment;

            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", url, true);

            //Função a ser chamada quando a requisição retornar do servidor
            xhttp.onreadystatechange = function(){

                //Verifica se o retorno do servidor deu certo
                if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
                    alet('comentou!');
                }
            }

        xhttp.send();//A execução do script CONTINUARÁ mesmo que a requisição não tenha retornado do servidor
    }
</script>
@endpush
