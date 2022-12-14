<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tipoProdutos = DB::select('SELECT * FROM tipo_produtos');
        } catch (\Throwable $th) {
            return $this->indexMessage( ["Erro! Leia atentamente para encontrar a solução: ".$th->getMessage(), 'danger'] );
        }
        return view('tipoproduto/index')->with('tipoProdutos', $tipoProdutos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMessage($message)
    {
        try {
            $tipoProdutos = DB::select('SELECT * FROM tipo_produtos');
        } catch (\Throwable $th) {
            return view("tipoproduto/index")->with("tipoProdutos", [])->with("message", $message);
            
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        return view('tipoproduto/index')->with('tipoProdutos', $tipoProdutos)->with("message", $message);
    }

    /**
     * Show the form for creating a new resource.
     * Mostrar um formulário para criação de um novo recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("TipoProduto/create");
    }

    /**
     * Store a newly created resource in storage.
     * Armazena um recurso recém criado na base de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $tipoProduto = new TipoProduto();
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->save();            
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        
        return $this->indexMessage( ["Cadastrado com sucesso!", 'success'] );
    }

    /**
     * Display the specified resource.
     * Mostra um recurso específico em detalhes.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tipoProdutos = DB::select('
            SELECT *
            FROM tipo_produtos 
            WHERE tipo_produtos.id = ?;
            ', [$id]);
            if ( count($tipoProdutos) > 0 ) {
                return view('tipoproduto/show')->with('tipoProduto', $tipoProdutos[0]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        return $this->indexMessage( ["Não encontrado.", 'danger'] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $tipoProduto = TipoProduto::find($id);
            if ( isset($tipoProduto) ) {
                return view('tipoproduto/edit')
                    ->with("tipoProduto", $tipoProduto);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        return $this->indexMessage( ["Não encontrado.", 'danger'] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $tipoProduto = TipoProduto::find($id); // retorna um obj ou null
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->update();
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        return $this->indexMessage( ["Atualizado com sucesso!", 'success'] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipoProduto = TipoProduto::find($id);
            $tipoProduto->delete();
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        return $this->indexMessage( ["Deletado com sucesso!", 'primary'] );
    }
}
