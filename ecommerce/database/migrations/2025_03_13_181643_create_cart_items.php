<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->integer('id', false, true)->length(10)->unsigned()->autoIncrement(); // id INT(10) UNSIGNED AUTO_INCREMENT
            $table->integer('cart_id', false, true)->length(10)->unsigned(); // cart_id INT(10) UNSIGNED
            $table->integer('produtos_id', false, true)->length(10)->unsigned(); // product_id INT(10) UNSIGNED
            $table->integer('quantity')->default(1);
            $table->timestamps();


            
            // Definição de chaves estrangeiras
            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
            $table->foreign('produtos_id')->references('id')->on('produtos')->onDelete('cascade');
            
            // Índices para otimização
            $table->index('cart_id');
            $table->index('produtos_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
