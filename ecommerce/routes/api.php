<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;


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


