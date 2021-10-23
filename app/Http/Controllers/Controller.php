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
    
}
