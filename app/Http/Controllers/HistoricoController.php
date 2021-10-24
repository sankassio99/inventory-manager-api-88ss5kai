<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Historico;
use App\Models\Produto;

class HistoricoController extends Controller
{
    protected $historico ;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Historico $historico)
    {
        $this->historico = $historico ;
    }

    public function index(){
        // return Historico::with('produto')->get();
        return $this->historico->join('produto','produto.id', '=', 'historico.produto_id')
            ->select('historico.id', 'historico.quantidade' , 'produto.SKU', 'tipo', 'data')
            ->get();

    }

    public function movimentacao($quantidade, $id_produto, $data, $tipo){
        $this->historico->create([
            'quantidade' => $quantidade,
            'produto_id' => $id_produto,
            'data' => $data,
            'tipo' => $tipo
        ]);
    }
}
