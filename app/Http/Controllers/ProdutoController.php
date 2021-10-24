<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Historico;

class ProdutoController extends Controller
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
        return response()->json($produtos) ;
    }   

    public function store(Request $request){
       $this->validate($request, [
            'nome' => 'required',
            'SKU' => 'required',
            'quantidade' => 'required|int'
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

        $this->validate($request, ['valor' => 'required|int']);

        if($produto==null){
            return response()->json(["erro" => "Recurso não encontrado"], 404) ;
        }

        $produto->quantidade = $produto->quantidade + $request->valor ;
        $produto->save();

        $this->historicoController->movimentacao(
            $request->valor, 
            $produto->id,
            $produto->updated_at->toDateTimeString(), 
            "ADICIONADO");

        return response()->json($produto) ;
    }

    public function removerQuantidade(int $id, Request $request){
        $produto = $this->produto->find($id);

        $this->validate($request, ['valor' => 'required|int']);

        if($produto==null){
            return response()->json(["erro" => "Recurso não encontrado"], 404) ;
        }
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

        return response()->json($produto) ;
    }
}
