@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
  @if (isset($message))
    <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
      <span>{{$message[0]}}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif 
  <form method="POST" action={{route("userinfo.store")}}>
    @csrf
      <div class="form-group">
        <label for="id-input-id">ID</label>
        <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
        <small id="idhelp" class="form-text text-muted">Não é necessário informar o ID.</small>
      </div>
      <div class="form-group">
        <label for="id-input-profileImg">profileImg</label>
        <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder="profileImg">
      </div>
      <div class="form-group">
        <label for="id-input-status">status</label>
        <input name="status" type="text" class="form-control" id="id-input-status" aria-describedby="statusHelp" placeholder="#" disabled>
        <small id="statushelp" class="form-text text-muted">Não é necessário informar o status.</small>
      </div>
      <div class="form-group">
        <label for="id-input-dataNasc">dataNasc</label>
        <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder="dataNasc">
      </div>
      <div class="form-group">
        <label for="id-input-genero">genero</label>
        <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder="genero">
      </div>
      <div class="my-1">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form> 
  </div>
  @endsection