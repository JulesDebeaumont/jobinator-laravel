<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', [Controller::class, 'home'])->name('home');

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])
    ->name('dashboard');

// Annonces
Route::get('/annonces', [AnnonceController::class, 'index'])
    ->name('annonce_index');

Route::post('/annonces', [AnnonceController::class, 'store'])
    ->middleware('auth');

Route::put('/annonces', [AnnonceController::class, 'store'])
    ->middleware('auth');

Route::get('/annonces/new', [AnnonceController::class, 'new'])
    ->middleware('auth')
    ->name('annonce_new');

Route::get('/annonces/{id}', [AnnonceController::class, 'show'])
    ->name('annonce_show');

Route::get('/annonces/{id}/edit', [AnnonceController::class, 'edit'])
    ->middleware(['auth'])
    ->name('annonce_edit');

Route::post('/annonces/{id}/delete', [AnnonceController::class, 'delete'])
    ->middleware(['auth'])
    ->name('annonce_delete');

// Auth
require __DIR__ . '/auth.php';
