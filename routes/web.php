<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminDoubtController;
use App\Http\Controllers\Admin\AdminGuyController;
use App\Http\Controllers\Admin\AdminPopularController;
use App\Http\Controllers\Admin\AdminProductController;

/*
|---------------------------------------------------------------------------
| Rutas públicas
|---------------------------------------------------------------------------
*/

// Página de inicio
Route::get('/', fn() => view('index'));

// Registro y Login
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'handle'])->name('register.handle');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'handle'])->name('login.handle');

// Logout
Route::post('/logout', [LogoutController::class, 'handle'])->name('logout');

// Página principal de usuarios registrados
Route::get('/home', [UserController::class, 'home'])->name('home');

// Rutas públicas adicionales
Route::get('/productos', [UserController::class, 'productos'])->name('productos');
Route::get('/productos/populares', [UserController::class, 'productosPopulares'])->name('productos.populares');
Route::get('/producto/{id}', [UserController::class, 'productoShow'])->name('producto.show');
Route::get('/tipos', [UserController::class, 'tipos'])->name('tipos');
Route::get('/contactar', [UserController::class, 'contactar'])->name('contactar');

/*
|---------------------------------------------------------------------------
| Rutas para Administrador (protegidas con auth y admin)
|---------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->prefix('admin')->group(function () {

        // Dashboard del administrador
        Route::get('/', fn() => view('admin.dashboard'))->name('admin.dashboard');

        // Productos - CRUD (usa resource)
        Route::resource('products', AdminProductController::class)->names('admin.products');

        // Productos Populares - CRUD
        Route::prefix('popular')->group(function () {
            Route::get('/', [AdminPopularController::class, 'index'])->name('admin.popular.index');
            Route::get('/create', [AdminPopularController::class, 'create'])->name('admin.popular.create');
            Route::post('/store', [AdminPopularController::class, 'store'])->name('admin.popular.store');
            Route::get('/{id}/edit', [AdminPopularController::class, 'edit'])->name('admin.popular.edit');
            Route::put('/{id}', [AdminPopularController::class, 'update'])->name('admin.popular.update');
            Route::delete('/{id}', [AdminPopularController::class, 'destroy'])->name('admin.popular.destroy');
            Route::get('/{id}', [AdminPopularController::class, 'show'])->name('admin.popular.show');
        });

        // Dudas de usuarios - CRUD
        Route::prefix('guys')->group(function () {
            Route::get('/', [AdminGuyController::class, 'index'])->name('admin.guys.index');
            Route::get('/create', [AdminGuyController::class, 'create'])->name('admin.guys.create');
            Route::post('/store', [AdminGuyController::class, 'store'])->name('admin.guys.store');
            Route::get('/{id}/edit', [AdminGuyController::class, 'edit'])->name('admin.guys.edit');
            Route::put('/{id}', [AdminGuyController::class, 'update'])->name('admin.guys.update');
            Route::delete('/{id}', [AdminGuyController::class, 'destroy'])->name('admin.guys.destroy');
            Route::get('/{id}', [AdminGuyController::class, 'show'])->name('admin.guys.show');
        });

        // Tipos y modelos - CRUD
        Route::prefix('doubts')->group(function () {
            Route::get('/', [AdminDoubtController::class, 'index'])->name('admin.doubts.index');
            Route::get('/{id}/edit', [AdminDoubtController::class, 'edit'])->name('admin.doubts.edit');
            Route::put('/{id}', [AdminDoubtController::class, 'update'])->name('admin.doubts.update');
            Route::delete('/{id}', [AdminDoubtController::class, 'destroy'])->name('admin.doubts.destroy');
            Route::get('/{id}', [AdminDoubtController::class, 'show'])->name('admin.doubts.show');
        });
    });
});
