@extends('layouts.main')
@section('titulo', "NoteCode")


@push('scripts')
    <style>
        .bntActions{
        margin: 2px; 
        }
        .titleCode{
            margin-left: 110px;
        }
        .codeblock{
            margin-top: -34px;
        }
    </style>
@endpush


@section('conteudo')

<hr>
<div class="center">
    <h5 class="grey-text">Meus Códigos</h5>
</div>

<!----------------- Loop -------------------->
@foreach ($notecodes as $mycode)
<h6 class="grey-text text-darken-1 titleCode">
    @if ($mycode->private==0)
        <i style="vertical-align: -1px;" class="material-icons tiny">public</i>
    @else
        <i style="vertical-align: -1px;" class="material-icons tiny">lock</i>
    @endif
    {{$mycode->title}}  <i class="devicon-{{$mycode->language}}-plain"></i> </h6>
<div class="row">
    
    <div class="col s1">
        <a  class="btn-flat grey lighten-2 grey-text bntActions" onclick="copyToClipboard({{$mycode->id}})"><i class="material-icons">content_copy</i></a>
        <a  class="btn-flat grey lighten-2 grey-text bntActions" onclick="editcode({{$mycode->id}})"><i class="material-icons">edit</i></a>
        <a  class="btn-flat grey lighten-2 grey-text bntActions"><i class="material-icons">delete</i></a>
    </div>
    <div class="col s11" id="Codediv{{$mycode->id}}">
<pre>   
<code class="grey lighten-2 z-depth-2 codeblock" id="codeblock{{$mycode->id}}">{{$mycode->notecode}}</code>
</pre>
<div class="right">{{$mycode->created_at->format('d/m/Y')}}</div>

    </div>
<div class="col hide s11" id="CodeEdit{{$mycode->id}}">
    <form action="note-edit/{{$mycode->id}}" method="POST">
        @csrf
        @method('PUT')
            <textarea id="codearea{{$mycode->id}}" name="notecode" style="height: 200px;border-style:groove;border-color: rgb(179, 179, 179);" class="materialize-textarea">{{$mycode->notecode}}</textarea>
            <a class="btn red lighten-1 white-text" onclick="canceledit({{$mycode->id}})">Cancelar</a>
            <button class="btn waves-effect waves-light grey" type="submit">Salvar
            <i class="material-icons right">save</i>
    </button>
    </form>
</div>
</div> 
<hr>
@endforeach


<!----------------- End Loop -------------------->

@endsection 

@push('scripts')
<script>
    function copyToClipboard(id) {
      /* Get the text field */
      var copyText = document.getElementById("codeblock"+id).innerText;
    
      navigator.clipboard.writeText(copyText);
    
      M.toast({html: 'Código Copiado!'})
    }
    
    function editcode(id){
        $('#CodeEdit'+id).removeClass('hide')
        $('#Codediv'+id).addClass('hide')
    }
    function canceledit(id){
        $('#CodeEdit'+id).addClass('hide')
        $('#Codediv'+id).removeClass('hide')
    }
    </script> 
@endpush
