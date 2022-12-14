@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
    <form method="POST" action={{route("produto.index")}}>
    @csrf
    <br>
      <div class="form-group">
        <label for="id-input-id">ID</label>
        <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
        <small id="idhelp" class="form-text text-muted">Não é necessário informar o ID.</small>
      </div>
      <div class="form-group">
        <label for="id-input-nome">Produto</label>
        <input name="nome" type="text" class="form-control" id="id-input-nome" placeholder="Nome do Produto">
      </div>
      <div class="form-group">
        <label for="id-input-preco">Preço</label>
        <input name="preco" type="number" step="0.01" class="form-control" id="id-input-preco" placeholder="0.00">
      </div>
      <div class="form-group">
        <label for="id-input-Tipo_Produtos_id">Tipo de Produto</label>
        <!--
        <input name="Tipo_Produtos_id" type="number" step="1" class="form-control" id="id-input-Tipo_Produtos_id" placeholder="Tipo do Produto">
        -->
        <select class="form-select" name="Tipo_Produtos_id" id="id-input-Tipo_Produtos_id" aria-label="Default select example">
          <option selected>Selecione</option>
          @foreach ($Produtos as $produto)
            <option value="{{$produto->tipo_produtos_id}}">{{$produto->tipo_produtos_descricao}}</option>      
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="id-input-ingredientes">Ingredientes</label>
        <input name="ingredientes" type="text" class="form-control" id="id-input-ingredientes" placeholder="Ingredientes">
      </div>
      <div class="form-group">
        <label for="id-input-urlImage">URL da Imagem</label>
        <input name="urlImage" type="text" class="form-control" id="id-input-urlImage" placeholder="URL">
      </div>

      <div class="my-1">
        <button type="submit" class="btn btn-primary">Salvar Produto</button>
        <a class="btn btn-secondary" href={{route("produto.index")}}> Cancelar </a>
      </div>
    </form> 
  </div>
  @endsection