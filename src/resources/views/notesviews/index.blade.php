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
        <a  class="btn-flat grey lighten-2 grey-text bntActions"><i class="material-icons">edit</i></a>
        <a  class="btn-flat grey lighten-2 grey-text bntActions"><i class="material-icons">delete</i></a>
    </div>
    <div class="col s11">
<pre>   
<code class="grey lighten-1 codeblock" id="codeblock{{$mycode->id}}">{{$mycode->notecode}}</code>
</pre>
<div class="right">{{$mycode->created_at->format('d/m/Y')}}</div>

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
    
      /* Select the text field  
      copyText.select();
      copyText.setSelectionRange(0, 99999);  For mobile devices */
    
       /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText);
    
      /* Alert the copied text */
      M.toast({html: 'Código Copiado!'})
    }
        
    </script> 
@endpush
