<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
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
    Route::get('/hardware-products', [ProductController::class, 'index'])
        ->name('hardware_products.index');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/logs', [LogController::class, 'index'])
    ->name('logs.index')
    ->middleware('auth');

    Route::get('/hardware-products/create', [ProductController::class, 'create'])
        ->name('hardware_products.create');

    Route::post('/hardware-products', [ProductController::class, 'store'])
        ->name('hardware_products.store');

    Route::get('/hardware-products/{id}', [ProductController::class, 'show'])
        ->where('id', '[0-9]+')
        ->name('hardware_products.show');

    Route::get('/hardware-products/{id}/edit', [ProductController::class, 'edit'])
        ->where('id', '[0-9]+')
        ->name('hardware_products.edit');

    Route::put('/hardware-products/{id}', [ProductController::class, 'update'])
        ->where('id', '[0-9]+')
        ->name('hardware_products.update');

    Route::delete('/hardware-products/{id}', [ProductController::class, 'destroy'])
        ->where('id', '[0-9]+')
        ->name('hardware_products.destroy');
});

// 📂 Upload de arquivos
Route::get('/upload', function () {
    return view('upload');
})->name('upload.form');

Route::post('/upload', [DocumentController::class, 'store'])->name('upload.store');

Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/document/{document}', [DocumentController::class, 'show'])->name('document.show');
Route::delete('/document/{document}', [DocumentController::class, 'destroy'])->name('document.destroy');

require __DIR__ . '/auth.php';
