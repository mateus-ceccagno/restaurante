@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
  <form action="{{route("tipoproduto.update", $tipoProduto->id)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="id-input-id">ID</label>
        <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="Digite os ingredientes" value="{{$tipoProduto->id}}" disabled>
      </div>
      <div class="form-group">
        <label for="id-input-descricao">Tipo de Produto</label>
        <input name="descricao" type="text" class="form-control" id="id-input-descricao" placeholder="Digite os ingredientes" value="{{$tipoProduto->descricao}}" required>
      </div>
      <div class="my-1">
          <a href="{{route("tipoproduto.index")}}" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>

  </div>
  @endsection