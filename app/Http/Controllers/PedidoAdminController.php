<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('PedidoAdmin/index');
    }

    public function getProdutos($id)
    {
        $produtos = DB::select('SELECT * FROM Produtos
                                WHERE Produtos.Tipo_Produtos_id = ?', [$id]);
        $response["success"] = true;
        $response["message"] = "Consulta de tipo realizada com sucesso";
        $response["return"] = $produtos;
        return response()->json($response, 200);
    }

    public function getTipoProdutos()
    {
        $tipoProdutos = DB::select('SELECT * FROM Tipo_Produtos');
        $response["success"] = true;
        $response["message"] = "Consulta de tipo realizada com sucesso";
        $response["return"] = $tipoProdutos;
        return response()->json($response, 200);
    }

    public function getPedidos()
    {
        $pedidos = DB::select('SELECT * FROM Pedidos ORDER BY Pedidos.id DESC');
        $response["success"] = true;
        $response["message"] = "Consulta de tipo realizada com sucesso";
        $response["return"] = $pedidos;
        return response()->json($response, 200);
    }

    public function getPedidoProdutos($id)
    {
        $pedidoProdutos = DB::select('SELECT Pedido_Produtos.Pedidos_id,
                                      Pedido_Produtos.Produtos_id,
                                      Tipo_Produtos.descricao,
                                      Produtos.nome,
                                      Produtos.preco,
                                      Pedido_Produtos.quantidade
                                      FROM Pedido_Produtos
                                      INNER JOIN Produtos on Pedido_Produtos.Produtos_id = Produtos.id
                                      INNER JOIN Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                      WHERE Pedido_Produtos.Pedidos_id = ?', [$id]);
        $response["success"] = true;
        $response["message"] = "Consulta de tipo realizada com sucesso";
        $response["return"] = $pedidoProdutos;
        return response()->json($response, 200);
    }
}
