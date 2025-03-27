<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;



Route::middleware(['auth'])->group(function () {
    Route::get('/admin/produtos', [ProductController::class, 'index'])->name('admin.produtos');
    Route::delete('/admin/produtos/{id}', [ProductController::class, 'destroy'])->name('admin.produtos.destroy');
});
Route::get('/admin/produtos/create', [ProductController::class, 'create'])->name('admin.produtos.create');
Route::post('/admin/produtos', [ProductController::class, 'store'])->name('admin.produtos.store');
Route::get('/admin/produtos/{id}/edit', [ProductController::class, 'edit'])->name('admin.produtos.edit');
Route::put('/admin/produtos/{id}', [ProductController::class, 'update'])->name('admin.produtos.update');
Route::post('/admin/produtos/pdf', [ProductController::class, 'generatePdf'])->name('admin.produtos.pdf');


Route::post('/admin/cadastrar-produto', [ProductController::class, 'store'])->name('cadastrar.produto');
Route::get('/produtos', [ProductController::class, 'index']);
Route::post('/produtos', [ProductController::class, 'store']);
Route::get('/produtos/{id}', [ProductController::class, 'show']);
Route::put('/produtos/{id}', [ProductController::class, 'update']);
Route::delete('/produtos/{id}', [ProductController::class, 'destroy']);



Route::get('/cart-items', [CartItemController::class, 'index']);
Route::post('/cart-items', [CartItemController::class, 'store']);
Route::put('/cart-items/{id}', [CartItemController::class, 'update']);
Route::delete('/cart-items/{id}', [CartItemController::class, 'destroy']);



Route::get('/usuarios', [UserController::class, 'index']); // Listar usuários
Route::get('/usuarios/{id}', [UserController::class, 'show']); // Mostrar um usuário
Route::post('/usuarios', [UserController::class, 'store']); // Criar usuário
Route::put('/usuarios/{id}', [UserController::class, 'update']); // Atualizar usuário
Route::delete('/usuarios/{id}', [UserController::class, 'destroy']); // Deletar usuário



Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'getCart']);
Route::delete('/cart/{id}', [CartController::class, 'removeFromCart']);



Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);






