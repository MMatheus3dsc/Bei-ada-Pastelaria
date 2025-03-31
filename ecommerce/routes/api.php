<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;




// Rotas públicas
Route::post('produtos/create', [ProductController::class, 'create'])->name('produtos.create');
Route::post('produtos', [ProductController::class, 'store'])->name('produtos.store');

// Rotas de autenticação
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');

// Rotas protegidas (requerem autenticação)
Route::middleware(['auth'])->group(function () {
    // Grupo Admin
    Route::prefix('admin')->group(function () {
        // Rotas de Produtos
        Route::resource('produtos', ProductController::class)->except(['show']);
        Route::post('produtos/pdf', [ProductController::class, 'generatePdf'])->name('produtos.pdf');
        
        // Rotas de Usuários
        Route::resource('user', UserController::class);

        // Rotas do Carrinho
 
        // Grupo do Carrinho
        Route::prefix('carrinho')->group(function () {
            // Visualização do carrinho completo (pode ser mantido no CartController)
            Route::get('/', [CartController::class, 'index'])->name('carrinho.index');
            
            // Gerenciamento de itens individuais
            Route::post('/itens', [CartItemController::class, 'store'])->name('carrinho.itens.adicionar');
            Route::put('/itens/{item}', [CartItemController::class, 'update'])->name('carrinho.itens.atualizar');
            Route::delete('/itens/{item}', [CartItemController::class, 'destroy'])->name('carrinho.itens.remover');
            
            // Operações adicionais do carrinho (exemplo)
            Route::post('/finalizar', [CartController::class, 'checkout'])->name('carrinho.finalizar');
            Route::post('/esvaziar', [CartController::class, 'clear'])->name('carrinho.esvaziar');
    });
    
    
        
    });
});