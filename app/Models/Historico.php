<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model {

    protected $fillable = ['quantidade' ,'produto_id', 'data', 'tipo'];

    protected $table = 'historico' ;
    public $timestamps = false;

    public function produto(){
        return $this->belongsTo(Produto::class);
    }

}