<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Historico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('quantidade');
            $table->dateTime('data');
            $table->enum('tipo', ['REMOVIDO', 'ADICIONADO']);
            $table->integer('produto_id');

            $table->foreign('produto_id')
                ->references('id')
                ->on('produto');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
