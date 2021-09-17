@extends('layouts.main')
@section('titulo', "NoteCode")

@section('conteudo')
<div class="row" style="margin-top: 20px;">

    <div class="col s2 center" style="margin: 5px;">
        <a href="" class="btn-flat grey lighten-1 white-text"><i class="material-icons">code</i></a>
        <h6 class="grey-text" style="font-size: 12px">Meus Códigos</h6>
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


<hr>
<h5 class="grey-text">Meus Códigos</h5>



@endsection 

@push('scripts')
    
@endpush
