<?php

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


Route::view('/', 'home')
    ->name('home');

Route::get('/bdView', [\App\Http\Controllers\BdController::class, 'createBdView'])
    ->name('bdView');

Route::post('/bdView', [\App\Http\Controllers\BdController::class, 'changeData']);

Route::post('/bdView/delete', [\App\Http\Controllers\BdController::class, 'deleteData']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
