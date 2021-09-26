@extends('layouts.main')
@section('titulo', "Notecode")
@push('styles')
    <style>
        .coments, .coment{
            margin: 5px;
            padding-top: 25px;
        }
    </style>

@endpush

@section('conteudo')

    <div class="col s12">
        <h5><i class="devicon-{{$getNote->language}}-plain"></i> {{$getNote->title}} </h5>
        <span class="datapost"><i> Postado: {{$getNote->created_at->format('d/m/Y - H:i')}} - <b>{{$getNote->user->name}}</b></i> </span>
        <pre><code class="grey lighten-2 z-depth-2 " id="codeblockk{{$getNote->id}}">{{$getNote->notecode}}</code></pre>         <a  class="btn-flat grey lighten-2 grey-text bntActions" onclick="copyToClipboard({{$getNote->id}})"><i class="material-icons">content_copy</i></a>
    </div>

    <div class="row">
        <div class="col s12">
            <hr>
            Comentários:
        </div>
    </div>
        @foreach ($getNote->coments as $coment)
        
            
                <div class="col s11 push-s1 z-depth-2 grey lighten-2 coments">
                    <spam class="coment"> <b>{{$coment->user}}:</b>   {{$coment->coment}}</spam>
                </div>
        
    

    @endforeach
@endsection 


@push('scripts')
    <script>
              function copyToClipboard(id) {
      /* Get the text field */
      var copyText = document.getElementById("codeblockk"+id).innerText;
    
      navigator.clipboard.writeText(copyText);
    
      M.toast({html: 'Código Copiado!'})
    }
    </script>

@endpush
