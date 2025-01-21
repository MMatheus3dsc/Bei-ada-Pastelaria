<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // ID do item no carrinho
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // ID do produto (chave estrangeira)
            $table->integer('quantity'); // Quantidade do produto
            $table->timestamps(); // Colunas 'created_at' e 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items'); // Remove a tabela em caso de rollback
    }
}
