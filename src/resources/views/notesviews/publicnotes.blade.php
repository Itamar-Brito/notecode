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
    <div class="col s11 push-s1">
        Comentarios:
    </div>
    @php
        $cont = 0;
    @endphp
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
        <div class="col s2 push-s1 left">
            <a href="" class="">ver todos</a>
        </div>
    @endif
</div>
<hr>
@endforeach

@endsection 


@push('scripts')
@endpush
