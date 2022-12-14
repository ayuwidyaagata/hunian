<?php

use App\Http\Controllers;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/', [Controllers\RumahController::class, 'index']);
Route::get('/data-rumah', [Controllers\RumahController::class, 'datarumah']);
Route::get('/data-penjual', [Controllers\RumahController::class, 'datapenjual']);

Route::get('/form-rumah', [Controllers\RumahController::class, 'formrumah']);
Route::get('/form-penjual', [Controllers\RumahController::class, 'formpenjual']);

Route::get('welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
