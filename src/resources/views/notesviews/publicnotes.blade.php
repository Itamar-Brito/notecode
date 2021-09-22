@extends('layouts.main')
@section('titulo', "Notecode")

@push('styles')
@endpush

@section('conteudo')
<div class="row">
    <div class="col s12 center">
        <h4>Codigos da comunidade</h4>
    </div>
    
</div>

@foreach ($AllNotes  as $notes)
    {{$notes->user->name}} <br>
    {{$notes->notecode}}
    <hr>
@endforeach

@endsection 


@push('scripts')
@endpush
