<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Historico;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $historicoController ;
    protected $produto ;

    public function __construct(Produto $produto, HistoricoController $historicoController)
    {
        $this->historicoController = $historicoController ;
        $this->produto = $produto ;
    }

    public function index(){
        $produtos = $this->produto->get();
        return $produtos ;
    }   

    public function store(Request $request){
        $params = $this->validate($request, [
            'nome' => 'required',
            'SKU' => 'required',
            'quantidade' => 'required'
        ]);

        return response()
        ->json(
            $this->produto->create($request->all()),
            201
        );
    }

    public function update(int $id, Request $request){
        $produto = $this->produto->find($id);

        if($produto==null){
            return response()->json(["erro" => "Recurso não encontrado"], 404) ;
        }
        $produto->fill($request->all());
        $produto->save();

        return response()->json($produto) ;
        
    }

    public function adicionarQuantidade(int $id, Request $request){
        $produto = $this->produto->find($id);

        $produto->quantidade = $produto->quantidade + $request->valor ;
        $produto->save();

        $this->historicoController->movimentacao(
            $request->valor, 
            $produto->id,
            $produto->updated_at->toDateTimeString(), 
            "ADICIONADO");

        return $produto ;
    }

    public function removerQuantidade(int $id, Request $request){
        $produto = $this->produto->find($id);

        if($request->valor > $produto->quantidade){
            return response()->json(["erro" => "Quantidade inválida"], 404);
        }

        $produto->quantidade = $produto->quantidade - $request->valor ;
        $produto->save();

        $this->historicoController->movimentacao(
            $request->valor, 
            $produto->id,
            $produto->updated_at->toDateTimeString(), 
            "REMOVIDO");

        return $produto ;
    }
}
