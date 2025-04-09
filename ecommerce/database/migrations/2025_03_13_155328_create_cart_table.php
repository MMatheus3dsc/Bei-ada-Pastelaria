<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            // Define o engine da tabela como InnoDB
            $table->engine = 'InnoDB';
    
            // Colunas da tabela
            $table->increments('id'); // ID como INT AUTO_INCREMENT
            $table->unsignedInteger('user_id'); // Chave estrangeira para usuários
            $table->unsignedInteger('products_id'); // Chave estrangeira para produtos
            $table->string('session_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->timestamps();
    

            
            // Definição correta das chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cart');
    }
    
    
};
