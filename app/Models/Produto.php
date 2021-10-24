<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model {

    protected $fillable = ['nome', 'marca', 'modelo' , 'SKU', 'quantidade', 'updated_at'];

    protected $table = 'produto' ;

    public function historico(){
        return $this->hasMany(Historico::class);
    }
}