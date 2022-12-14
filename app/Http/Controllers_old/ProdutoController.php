<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\TipoProduto;
use DB;

class ProdutoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web'); // Especificando qual guarda estamos utilizando
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $Produtos = DB::select("SELECT produtos.id as produtos_id,
                                        produtos.nome as produtos_nome,
                                        produtos.preco as produtos_preco,
                                        tipo_produtos.descricao as tipo_produtos_descricao,
                                        produtos.ingredientes as produtos_ingredientes,
                                        produtos.urlImage as produtos_urlImage
                                    FROM produtos 
                                    INNER JOIN tipo_produtos 
                                    ON produtos.Tipo_Produtos_id = tipo_produtos.id;
                                ");

        } catch (\Throwable $th) {
            return $this->indexMessage( ["Erro! Leia atentamente para encontrar a solução: ".$th->getMessage(), 'danger'] );
        }
        return view('Produto/index')->with("Produtos", $Produtos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMessage($message)
    {
        try {
            $Produtos = DB::select("SELECT produtos.id as produtos_id,
                                        produtos.nome as produtos_nome,
                                        produtos.preco as produtos_preco,
                                        tipo_produtos.descricao as tipo_produtos_descricao,
                                        produtos.ingredientes as produtos_ingredientes,
                                        produtos.urlImage as produtos_urlImage
                                    FROM produtos 
                                    INNER JOIN tipo_produtos 
                                    ON produtos.Tipo_Produtos_id = tipo_produtos.id;
                                ");

        } catch (\Throwable $th) {
            return view("produto/index")->with("Produtos", [])->with("message", $message);
        }
        return view("Produto/index")->with("Produtos", $Produtos)->with("message", $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $Produtos = DB::select("SELECT tipo_produtos.id as tipo_produtos_id,
                                        tipo_produtos.descricao as tipo_produtos_descricao
                                    FROM tipo_produtos;
                                ");
                                
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        return view('Produto/create')->with('Produtos', $Produtos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $Produto = new Produto();
            $Produto->nome = $request->nome;
            $Produto->preco = $request->preco;
            $Produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $Produto->ingredientes = $request->ingredientes;
            $Produto->urlImage = $request->urlImage;
            $Produto->save();
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        
        return $this->indexMessage( ["Cadastrado com sucesso!", 'success'] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $Produtos = DB::select("SELECT produtos.id,
                                        produtos.nome,
                                        produtos.preco,
                                        tipo_produtos.descricao as tipoproduto,
                                        produtos.ingredientes,
                                        produtos.urlImage,
                                        produtos.created_at,
                                        produtos.updated_at
                                    FROM produtos 
                                    INNER JOIN tipo_produtos 
                                    ON produtos.Tipo_Produtos_id = tipo_produtos.id
                                    WHERE produtos.id = ? ;
                                ", [$id]);
            
            if ( count($Produtos) > 0 ) {
                return view('produto/show')->with('produto', $Produtos[0]);
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
            $produto = Produto::find($id);
            if ( isset($produto)) {
                $tipoProdutos = TipoProduto::all();
                return view("Produto/edit")
                    ->with("produto", $produto)
                    ->with("tipoProdutos", $tipoProdutos);
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
            $produto = Produto::find($id); // retorna um obj ou null
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->ingredientes = $request->ingredientes;
            $produto->urlImage = $request->urlImage;
            $produto->update();
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
            $produto = Produto::find($id);
            $produto->delete();
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        return $this->indexMessage( ["Deletado com sucesso!", 'primary'] );        
    }
}
