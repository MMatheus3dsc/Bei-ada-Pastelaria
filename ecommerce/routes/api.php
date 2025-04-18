<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;







// Rotas de autenticação para API (stateless)
Route::post('/login', [AuthController::class, 'apiLogin']);
Route::post('/logout', [AuthController::class, 'apiLogout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);

// 🛒 Rotas públicas da API (ex: listar produtos)
Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
Route::post('/products', [ProductController::class, 'store'])->name('admin.products.create');

// 🔐 Rotas protegidas (requer autenticação)
Route::middleware(['auth:sanctum'])->group(function () {


    // 🔹 Admin - CRUD de produtos
    Route::prefix('admin')->group(function () {
        Route::resource('/products', ProductController::class)->except(['show']);
        Route::post('products/pdf', [ProductController::class, 'generatePdf'])->name('api.products.pdf');

        // 🔹 Gestão de usuários
        Route::resource('user', UserController::class);
    });

    // 🛒 Rotas do Carrinho (Protegidas)
    Route::prefix('carrinho')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('api.carrinho.index');
        Route::post('/itens', [CartItemController::class, 'store'])->name('api.carrinho.itens.adicionar');
        Route::put('/itens/{item}', [CartItemController::class, 'update'])->name('api.carrinho.itens.atualizar');
        Route::delete('/itens/{item}', [CartItemController::class, 'destroy'])->name('api.carrinho.itens.remover');
        Route::post('/finalizar', [CartController::class, 'checkout'])->name('api.carrinho.finalizar');
        Route::post('/esvaziar', [CartController::class, 'clear'])->name('api.carrinho.esvaziar');
    });
});