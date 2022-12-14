@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
  <form action="{{route("userinfo.update", $userInfo->Users_id)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="id-input-id">ID</label>
        <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="ID" value="{{$userInfo->Users_id}}" disabled>
        <small id="idhelp" class="form-text text-muted">Não é possível alterar o ID.</small>
      </div>
      <div class="form-group">
        <label for="id-input-profileImg">profileImg</label>
        <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder="profileImg" value="{{$userInfo->profileImg}}" required>
      </div>
      <div class="form-group">
        <label for="id-input-status">status</label>
        <input type="text" class="form-control" id="id-input-status" aria-describedby="idHelp" placeholder="status" value="{{$userInfo->status}}" disabled>
        <small id="statushelp" class="form-text text-muted">Não é possível alterar o status.</small>
      </div>
      <div class="form-group">
        <label for="id-input-dataNasc">dataNasc</label>
        <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder="dataNasc" value="{{$userInfo->dataNasc}}" required>
      </div>
      <div class="form-group">
        <label for="id-input-genero">genero</label>
        <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder="genero" value="{{$userInfo->genero}}" required>
      </div>

      <div class="my-1">
          <a href="{{route("userinfo.create")}}" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
  @endsection