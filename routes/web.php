<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CageController;
use App\Http\Controllers\AnimalController;


// Главная страница
Route::get('/', fn () => redirect()->route('cages.index'));
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Профиль
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Приватные маршруты (создание, изменение, удаление)
Route::middleware(['auth'])->group(function () {
    
    Route::resource('cages', CageController::class)->except(['index', 'show']);
    Route::resource('animals', AnimalController::class)->except(['index', 'show']);
});
// Публичные маршруты (только просмотр)
Route::resource('cages', CageController::class)->only(['index', 'show']);
Route::resource('animals', AnimalController::class)->only(['index', 'show']);



// Route::resource('cages', CageController::class)->middleware(['auth'])->except(['index', 'show']);





require __DIR__.'/auth.php';
