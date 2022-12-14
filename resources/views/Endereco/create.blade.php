@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
    <form method="POST" action={{route("endereco.index")}}>
    @csrf
      <div class="form-group">
        <label for="id-input-id">ID</label>
        <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
        <small id="idhelp" class="form-text text-muted">Não é necessário informar o ID.</small>
      </div>
      <div class="form-group">
        <label for="id-input-bairro">Bairro</label>
        <input name="bairro" type="text" class="form-control" id="id-input-bairro" placeholder="Bairro">
      </div>
      <div class="form-group">
        <label for="id-input-logradouro">Logradouro</label>
        <input name="logradouro" type="text" class="form-control" id="id-input-logradouro" placeholder="Logradouro">
      </div>
      <div class="form-group">
        <label for="id-input-numero">Numero</label>
        <input name="numero" type="text" class="form-control" id="id-input-numero" placeholder="Numero">
      </div>
      <div class="form-group">
        <label for="id-input-complemento">Complemento</label>
        <input name="complemento" type="text" class="form-control" id="id-input-complemento" placeholder="Complemento">
      </div>
      <div class="my-1">
        <button type="submit" class="btn btn-primary">Salvar Endereço</button>
        <a class="btn btn-danger" href={{route("endereco.index")}}> Cancelar </a>
      </div>
    </form>
  </div>
  @endsection