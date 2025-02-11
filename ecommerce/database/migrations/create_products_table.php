<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Cria uma coluna ID (chave primária)
            $table->string('nome'); // Nome do produto
            $table->string('tipo'); // tipo do produto
            $table->text('descricao'); // Descrição do produto
            $table->decimal('preco', 10, 2); // Preço do produto
            $table->integer('stock'); // Quantidade em estoque
            $table->timestamps(); // 'created_at' e 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos'); // Remove a tabela
    }
}
