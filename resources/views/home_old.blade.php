@extends('layouts.app')

@section('content')
<div class="container bg-dark rounded rounded-3">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    {{ __('You are logged in!') }}
                </div>
            </div>
            <br>
            <div class="card text-white bg-dark">
                <div class="card-header">{{ __('Navegar') }}</div>
    
                <div class="card-body row">
                    <div class="card col-md-6 bg-dark">
                        <a class="btn btn-primary" href={{route("tipoproduto.index")}}> 
                            <i class="fas fa-box"> Tipos de Produtos </i> 
                        </a>
                    </div>
                    <div class="card col-md-6 bg-dark">
                        <a class="btn btn-primary" href={{route("produto.index")}}>  
                            <i class="fas fa-carrot" aria-hidden="true"> Produtos </i>
                        </a> 
                    </div>
                    <div class="card bg-dark">
                        <a class="btn btn-primary" href={{route("pedidousuario.index")}}> 
                            <i class="fas fa-shopping-cart" aria-hidden="true"> Realizar Pedido </i>
                        </a> 
                    </div>
                    <div class="card bg-dark">
                        <a class="btn btn-primary" href={{route("endereco.index")}}>
                            <i class="fas fa-thumbtack" aria-hidden="true"> Enderecos </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection