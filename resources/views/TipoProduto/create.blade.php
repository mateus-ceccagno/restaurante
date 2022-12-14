@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
    <form method="POST" action={{route("tipoproduto.index")}}>
    @csrf
      <div class="form-group">
        <label for="id-input-id">ID</label>
        <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
        <small id="idhelp" class="form-text text-muted">Não é necessário informar o ID.</small>
      </div>
      <div class="form-group">
        <label for="id-input-descricao">Tipo de Produto</label>
        <input name="descricao" type="text" class="form-control" id="id-input-descricao" placeholder="Descrição">
      </div>
      <div class="my-1">
        <button type="submit" class="btn btn-primary">Salvar Produto</button>
        <a class="btn btn-danger" href={{route("tipoproduto.index")}}> Cancelar </a>
      </div>
    </form> 
  </div>
  @endsection