<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/api/publications', function () {
    return view('publications.index');
});

Route::get('/api/publications/{id}', function () {
    return view('publications.show');
});

Route::get('/api/publications/create', function () {
    return view('publications.create');
});

Route::post('/api/publications', function () {
    return view('publications.store');
});

Route::get('/api/publications/{id}/edit', function () {
    return view('publications.edit');
});

Route::put('/api/publications/{id}', function () {
    return view('publications.update');
});

Route::delete('/api/publications/{id}', function () {
    return view('publications.destroy');
});
require __DIR__.'/auth.php';
