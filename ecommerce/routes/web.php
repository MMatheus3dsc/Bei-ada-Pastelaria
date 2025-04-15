<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;




// 🌐 Rota inicial
Route::get('/', function () {
    return view('welcome');
});

// 🔐 Rotas protegidas (usuários autenticados)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/products', function () {
        return view('admin.products.index'); 
    })->name('admin.products.index'); 
});
// 🔹 Rotas de autenticação para a web (com views)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// routes/web.php
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('products',  ProductController::class)
         ->names([
             'index' => 'admin.products.index',
             'create' => 'admin.products.create',
             'store' => 'admin.products.store',
             'show' => 'admin.products.show',
             'edit' => 'admin.products.edit',
             'update' => 'admin.products.update',
             'destroy' => 'admin.products.destroy'
         ]);
        
         Route::resource('user', UserController::class);
});
