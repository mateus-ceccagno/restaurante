@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
  <form action="{{route("endereco.update", $endereco->id)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="id-input-id">ID</label>
        <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="Digite os ingredientes" value="{{$endereco->id}}" disabled>
      </div>
      <div class="form-group">
        <label for="id-input-bairro">Bairro</label>
        <input name="bairro" type="text" class="form-control" id="id-input-bairro" placeholder="Bairro" value="{{$endereco->bairro}}" required>
      </div>
      <div class="form-group">
        <label for="id-input-logradouro">Logradouro</label>
        <input name="logradouro" type="text" class="form-control" id="id-input-logradouro" placeholder="Logradouro" value="{{$endereco->logradouro}}" required>
      </div>
      <div class="form-group">
        <label for="id-input-numero">Numero</label>
        <input name="numero" type="text" class="form-control" id="id-input-numero" placeholder="Numero" value="{{$endereco->numero}}" required>
      </div>
      <div class="form-group">
        <label for="id-input-complemento">Complemento</label>
        <input name="complemento" type="text" class="form-control" id="id-input-complemento" placeholder="Complemento" value="{{$endereco->complemento}}" required>
      </div>
      <div class="my-1">
          <a href="{{route("endereco.index")}}" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
  @endsection