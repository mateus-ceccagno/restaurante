<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnderecoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $this->middleware('auth:web'); // Especificando qual guarda estamos utilizando
        } catch (\Throwable $th) {
            return $this->indexMessage( ["Erro! Leia atentamente para encontrar a solução: ".$th->getMessage(), 'danger'] );
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $enderecos = DB::select("SELECT * FROM enderecos");
        } catch (\Throwable $th) {
            return $this->indexMessage( ["Erro! Leia atentamente para encontrar a solução: ".$th->getMessage(), 'danger'] );
        }
        return view('endereco/index')->with('enderecos', $enderecos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMessage($message)
    {
        try {
            $enderecos = DB::select('SELECT * FROM enderecos');
        } catch (\Throwable $th) {
            return view("endereco/index")->with("enderecos", [])->with("message", $message);
            
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        return view('endereco/index')->with('enderecos', $enderecos)->with("message", $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('endereco/create');
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
            // Pega o id do usuário logado
            $loggedUserId = Auth::user()->id;

            $endereco = new Endereco();
            $endereco->Users_id = $loggedUserId;
            $endereco->bairro = $request->bairro;
            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->save();            
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
            $endereco = Endereco::find($id);
            
            return view('endereco/show')->with('endereco', $endereco);
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
            $endereco = Endereco::find($id);
            if ( isset($endereco) ) {
                return view('endereco/edit')
                    ->with("endereco", $endereco);
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
            // Pega o id do usuário logado
            $loggedUserId = Auth::user()->id;

            $endereco = Endereco::find($id); // retorna um obj ou null
            $endereco->Users_id = $loggedUserId;
            $endereco->bairro = $request->bairro;
            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;

            $endereco->update();
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
            $endereco = Endereco::find($id);
            $endereco->delete();
        } catch (\Throwable $th) {
            return $this->indexMessage( [$th->getMessage(), 'danger'] );
        }
        return $this->indexMessage( ["Deletado com sucesso!", 'primary'] );        
    }
}
