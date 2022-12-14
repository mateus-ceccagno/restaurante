@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
    <div class="form-group">
      <label for="id-input-id">ID</label>
      <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="ID" value="{{$endereco->id}}" disabled>
    </div>
    <div class="form-group">
      <label for="id-input-bairro">Bairro</label>
      <input name="bairro" type="text" class="form-control" id="id-input-bairro" placeholder="Bairro" value="{{$endereco->bairro}}" disabled>
    </div>
    <div class="form-group">
      <label for="id-input-logradouro">Logradouro</label>
      <input name="logradouro" type="text" class="form-control" id="id-input-logradouro" placeholder="Logradouro" value="{{$endereco->logradouro}}" disabled>
    </div>
    <div class="form-group">
      <label for="id-input-numero">Numero</label>
      <input name="numero" type="text" class="form-control" id="id-input-numero" placeholder="Número" value="{{$endereco->numero}}" disabled>
    </div>
    <div class="form-group">
      <label for="id-input-complemento">Complemento</label>
      <input name="complemento" type="text" class="form-control" id="id-input-complemento" placeholder="complemento" value="{{$endereco->complemento}}" disabled>
    </div>
    <div class="form-group">
      <label for="id-input-created_at">Data de Criação</label>
      <input name="created_at" type="text" class="form-control" id="id-input-created_at" placeholder="Criação" value="{{$endereco->created_at}}" disabled>
    </div>
    <div class="form-group">
      <label for="id-input-updated_at">Ultima Alteração</label>
      <input name="updated_at" type="text" class="form-control" id="id-input-updated_at" placeholder="Atualização" value="{{$endereco->updated_at}}" disabled>
    </div>
    <div class="my-1">
      <a class="btn btn-danger" href={{route("endereco.index")}}> Voltar </a>
    </div> 
  </div>
  @endsection