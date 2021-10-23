<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'name' => Str::random(10),
            'marca' => Str::random(10),
            'modelo' => Str::random(10),
            'SKU' => Str::random(6),
            'qtd' => Int::random(3),
        ]);
    }
}
