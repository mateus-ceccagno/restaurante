@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
  <div class="form-group">
    <label for="id-input-id">ID</label>
    <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder={{$produto->id}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-nome">Produto</label>
    <input name="nome" type="text" class="form-control" id="id-input-nome" placeholder={{$produto->nome}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-preco">Preço</label>
    <input name="preco" type="number" step="0.01" class="form-control" id="id-input-preco" placeholder={{$produto->preco}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-Tipo_Produtos_id">Tipo de Produto</label>
    <input name="Tipo_Produtos_id" type="number" step="1" class="form-control" id="id-input-Tipo_Produtos_id" placeholder={{$produto->tipoproduto}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-ingredientes">Ingredientes</label>
    <input name="ingredientes" type="text" class="form-control" id="id-input-ingredientes" placeholder={{$produto->ingredientes}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-urlImage">URL da Imagem</label>
    <input name="urlImage" type="text" class="form-control" id="id-input-urlImage" placeholder={{$produto->urlImage}}nenhuma imagem disabled>
  </div>
  <div class="form-group">
    <label for="id-input-descricao">Data de Criação</label>
    <input name="descricao" type="text" class="form-control" id="id-input-descricao" placeholder={{$produto->created_at}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-descricao">Ultima Alteração</label>
    <input name="descricao" type="text" class="form-control" id="id-input-descricao" placeholder={{$produto->updated_at}} disabled>
  </div>

  <div class="my-1">
    <a class="btn btn-primary" href="{{route("produto.index")}}"> Voltar </a>
  </div> 
</div>
@endsection