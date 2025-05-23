<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;




// 🌐 Rota inicial
Route::get('/', function () {
    return file_get_contents(__DIR__.'/../../frontend/public/index.html');
});
Route::get('/{filename}', function ($filename) {
    $path = __DIR__.'/../../public/'.$filename;
    if (file_exists($path)) {
        return response()->file($path);
    }
    abort(404);
})->where('filename', '.*');


// 🔹 Rotas de autenticação para a web (com views)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Rotas de produtos
        Route::resource('products', ProductController::class);
        
        // Rotas de usuários (se necessário)
        Route::resource('users', UserController::class);
    });
});