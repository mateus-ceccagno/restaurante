@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
  @if ( isset ($message) )
  <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
      <span>{{$message[0]}}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="form-group">
    <label for="id-input-id">ID</label>
    <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder={{$userInfo->Users_id}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-profileImg">profileImg</label>
    <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder={{$userInfo->profileImg}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-status">status</label>
    <input name="status" type="text" class="form-control" id="id-input-status" placeholder={{$userInfo->status}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-dataNasc">dataNasc</label>
    <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder={{$userInfo->dataNasc}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-genero">genero</label>
    <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder={{$userInfo->genero}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-created_at">Data de Criação</label>
    <input name="created_at" type="text" class="form-control" id="id-input-created_at" placeholder={{$userInfo->created_at}} disabled>
  </div>
  <div class="form-group">
    <label for="id-input-updated_at">Ultima Alteração</label>
    <input name="updated_at" type="text" class="form-control" id="id-input-updated_at" placeholder={{$userInfo->updated_at}} disabled>
  </div>
    
  <a href={{route("userinfo.edit", $userInfo->Users_id)}} class="btn btn-secondary">Editar</a>
  <a 
    href="#" 
    class="btn btn-danger class-button-destroy" 
    data-bs-toggle="modal" 
    data-bs-target="#destroyModal"
    value="{{route("userinfo.destroy", $userInfo->Users_id)}}"
    >Excluir
  </a>
  
  <!-- Modal -->
  <div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="destroyModalLabel">Excluir Recurso?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Realmente deseja remover o recurso?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form id="id-form-modal-botao-remover" method="POST">
          @csrf
          @method('DELETE')
          <input TYPE="submit" class="btn btn-danger" value="Confirmar Remoção">
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  const arrayBtnRemover = document.querySelectorAll(".class-button-destroy");
  const formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover")
  //console.log(arrayBtnRemover);
  arrayBtnRemover.forEach(btnRemover => {
    btnRemover.addEventListener("click", configurarBotaoremoverModal)
  });
  function configurarBotaoremoverModal() {
    formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));
  }
</script>

</div>
@endsection