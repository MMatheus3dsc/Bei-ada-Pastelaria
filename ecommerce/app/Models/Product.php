<?php

namespace App\Models;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Cria uma coluna ID (chave primária)
            $table->string('name'); // Coluna para o nome do produto
            $table->text('description'); // Coluna para descrição do produto
            $table->decimal('price', 10, 2); // Coluna para o preço
            $table->integer('stock'); // Coluna para quantidade em estoque
            $table->timestamps(); // Colunas 'created_at' e 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('products'); // Remove a tabela se precisar reverter
    }
}
