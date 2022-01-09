<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotacaoFreteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_frete', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transportadora_id')->references('id')->on('transportadora');
            $table->string('uf', 2);
            $table->decimal('percentual_cotacao', 10, 2);
            $table->decimal('valor_extra', 10, 2);

            $table->unique(['transportadora_id', 'uf']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotacao_frete');
    }
}
