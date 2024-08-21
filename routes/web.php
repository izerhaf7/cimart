<?php

use App\Http\Controllers\ProfileController;
use App\Models\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = Products::all();
    return view('welcome', compact('data'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/detail/{id?}', function(?int $id = 0){
    return view('detailPage', compact('id'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
