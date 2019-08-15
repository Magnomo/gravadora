<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cd', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->integer('quantidade_musicas');
            $table->double('preco');
            $table->string('artista');
            $table->integer('gravadora_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cd');
    }
}
