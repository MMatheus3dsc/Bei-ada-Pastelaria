<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Cria uma coluna ID (chave primária)
            $table->string('name'); // Nome do produto
            $table->string('type'); // tipo do produto
            $table->text('description'); // Descrição do produto
            $table->decimal('price', 10, 2); // Preço do produto
            $table->string('image');
            $table->unsignedInteger('stock'); // Quantidade em estoque
            $table->timestamps(); // 'created_at' e 'updated_at'
        },'utf8mb4_unicode_ci');
    }

    public function down()
    {
        Schema::dropIfExists('produtos'); // Remove a tabela
    }
};
