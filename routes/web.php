<?php

use App\Http\Controllers\HardwareProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/hardware-products', [HardwareProductController::class, 'index'])
        ->name('hardware_products.index');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/hardware-products/create', [HardwareProductController::class, 'create'])
        ->name('hardware_products.create'); // <--- Adicionando a rota create

    Route::post('/hardware-products', [HardwareProductController::class, 'store'])
        ->name('hardware_products.store'); // <--- Adicionando a rota store

    Route::get('/hardware-products/{id}', [HardwareProductController::class, 'show'])
        ->name('hardware_products.show');

    Route::get('/hardware-products/{id}/edit', [HardwareProductController::class, 'edit'])
        ->name('hardware_products.edit');

    Route::put('/hardware-products/{id}', [HardwareProductController::class, 'update'])
        ->name('hardware_products.update');

    Route::delete('/hardware-products/{id}', [HardwareProductController::class, 'destroy'])
        ->name('hardware_products.destroy');
});



require __DIR__ . '/auth.php';
