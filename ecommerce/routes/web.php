<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\AuthController;




Route::get('/', [ProductController::class, 'home'])->name('home');


// 🔹 Rotas de autenticação para a web (com views)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('cart', [CartController::class, 'addToCart'])->name('cart.add');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Rotas de produtos
        Route::resource('products', ProductController::class);
        
        // Rotas de usuários (se necessário)
        Route::resource('users', UserController::class);
    });
});

