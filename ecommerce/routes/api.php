<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;


Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);



Route::get('/cart-items', [CartItemController::class, 'index']);
Route::post('/cart-items', [CartItemController::class, 'store']);
Route::put('/cart-items/{id}', [CartItemController::class, 'update']);
Route::delete('/cart-items/{id}', [CartItemController::class, 'destroy']);



Route::get('/users', [UserController::class, 'index']); // Listar usuários
Route::get('/users/{id}', [UserController::class, 'show']); // Mostrar um usuário
Route::post('/users', [UserController::class, 'store']); // Criar usuário
Route::put('/users/{id}', [UserController::class, 'update']); // Atualizar usuário
Route::delete('/users/{id}', [UserController::class, 'destroy']); // Deletar usuário


