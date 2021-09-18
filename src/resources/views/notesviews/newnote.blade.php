@extends('layouts.main')
@section('titulo', "NoteCode")

@push('styles')
<style>
    #textarea1{
        height: 200px;
        border-style:groove;
        border-color: rgb(179, 179, 179);
    }
    
</style>
@endpush

@section('conteudo')
<hr>
<div class="row">
    <form action="" method="POST">
        <div class="col s12">
                <h4>Nova Anotação de código:</h4><br>
                    <div class="switch">
                    <label>
                      <input type="checkbox" checked>
                      <span class="lever"></span>
                      Privado
                    </label>
                  </div>
                  <div class="input-field col s10 m8 l8">
                    <i class="material-icons prefix">title</i>
                    <input type="text" id="titulo" name="titulo" class="autocomplete">
                    <label for="titulo">Título</label>
                  </div>
                  <div class="row">
                    <div class="input-field col s10 m4 l3">
                      <select class="icons">
                        <option value="" disabled selected>Escolha linguagem</option>
                        <option value="php" data-icon="/img/devicons/php.svg" class="left">PHP</option>
                        <option value="html5" data-icon="/img/devicons/html.svg" class="left">HTML</option>
                        <option value="javascript" data-icon="/img/devicons/javascript.svg" class="left">JavaScript</option>
                        <option value="javascript" data-icon="/img/devicons/css3.svg" class="left">CSS</option>
                        <option value="python" data-icon="/img/devicons/python.svg" class="left">Python</option>
                        <option value="java" data-icon="/img/devicons/java.svg" class="left">Java</option>
                        <option value="" data-icon="" class="left">Outra</option>
                      </select>
                      <label>Liguagem</label>
                    </div>
                    <div class="input-field col s12">
                        Código:
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                      </div>
                  </div>
                  <a href="/" class="btn red white-text"> cancelar</a>
                  <button class="btn waves-effect waves-light grey" type="submit" name="action">Enviar
                      <i class="material-icons right">send</i>
                  </button>
        </div>
    </form>
</div>
@endsection 


@push('scripts')
    

@endpush
