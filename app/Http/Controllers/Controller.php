<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produtos;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index(){
        $produtos = Produtos::get();
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
            Produtos::create($request->all()),
            201
        );
    }

    public function update(int $id, Request $request){
        $produto = Produtos::find($id);
        
        if($produto==null){
            return response()->json(["erro" => "Recurso não encontrado"], 404) ;
        }
        $produto->fill($request->all());
        $produto->save();

        return response()->json($produto) ;
        
    }

    public function adicionarQuantidade(int $id, Request $request){
        $produto = Produtos::find($id);

        $produto->quantidade = $produto->quantidade + $request->valor ;
        $produto->save();

        return $produto ;
    }

    public function removerQuantidade(int $id, Request $request){
        $produto = Produtos::find($id);

        if($request->valor > $produto->quantidade){
            return response()->json(["erro" => "Quantidade inválida"], 404);
        }

        $produto->quantidade = $produto->quantidade - $request->valor ;
        $produto->save();

        return $produto ;
    }
    
}
