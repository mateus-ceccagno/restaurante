@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
    
    @if ( isset ($message) )
        <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
            <span>{{$message[0]}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <table class="table table-hover table-dark rounded rounded-3 overflow-hidden">
        <thead>
            <tr>
                <th scope="col">
                    <a class="btn btn-success" href={{route("tipoproduto.create")}}> Novo Tipo de Produto </a> 
                    <a class="btn btn-danger" href={{route("home")}}> Voltar </a>
                </th>
            </tr>
        </thead>
    </table>
    <table class="table table-hover table-dark rounded rounded-3 overflow-hidden">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tipoProdutos as $tipoProduto)
                <tr>
                    <th scope="row">{{$tipoProduto->id}}</th>
                    <td>{{$tipoProduto->descricao}}</td>
                    <td>
                        <a href={{route("tipoproduto.show", $tipoProduto->id)}} class="btn btn-primary">Ver</a>
                        <a href={{route("tipoproduto.edit", $tipoProduto->id)}} class="btn btn-secondary">Editar</a>
                        <a 
                            href="#" 
                            class="btn btn-danger class-button-destroy" 
                            data-bs-toggle="modal" 
                            data-bs-target="#destroyModal"
                            value="{{route("tipoproduto.destroy", $tipoProduto->id)}}"
                            >Excluir
                        </a>
                    </td>
                </tr>      
            @endforeach
        </tbody>
    </table>


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