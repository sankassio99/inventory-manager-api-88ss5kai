<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model {

    protected $fillable = ['nome', 'marca', 'modelo' , 'SKU', 'quantidade'];

    protected $table = 'produtos' ;
}