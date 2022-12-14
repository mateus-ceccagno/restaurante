@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
    <div class="form-group">
      <label for="id-input-id">ID</label>
      <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder={{$tipoProduto->id}} disabled>
    </div>
    <div class="form-group">
      <label for="id-input-descricao">Tipo de Produto</label>
      <input name="descricao" type="text" class="form-control" id="id-input-descricao" placeholder={{$tipoProduto->descricao}} disabled>
    </div>
    <div class="form-group">
      <label for="id-input-descricao">Data de Criação</label>
      <input name="descricao" type="text" class="form-control" id="id-input-descricao" placeholder={{$tipoProduto->created_at}} disabled>
    </div>
    <div class="form-group">
      <label for="id-input-descricao">Ultima Alteração</label>
      <input name="descricao" type="text" class="form-control" id="id-input-descricao" placeholder={{$tipoProduto->updated_at}} disabled>
    </div>
    <div class="my-1">
      <a class="btn btn-danger" href={{route("tipoproduto.index")}}> Voltar </a>
    </div> 
  </div>
  @endsection