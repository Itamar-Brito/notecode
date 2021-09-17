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
<h6 class="grey-text text-darken-1 titleCode">{{$mycode->title}} - <i class="devicon-{{$mycode->language}}-plain"></i> </h6>
<div class="row">
    
    <div class="col s1">
        <a href="" class="btn-flat grey lighten-2 grey-text bntActions"><i class="material-icons">edit</i></a>
        <a href="" class="btn-flat grey lighten-2 grey-text bntActions"><i class="material-icons">delete</i></a>
        <a href="" class="btn-flat grey lighten-2 grey-text bntActions"><i class="material-icons">content_copy</i></a>
    </div>
    <div class="col s11">
<pre>   
<code class="grey lighten-1 codeblock">{{$mycode->notecode}}</code>
</pre>



    </div>
</div>   
<hr>
@endforeach


<!----------------- End Loop -------------------->

@endsection 

@push('scripts')
    
@endpush
