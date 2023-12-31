<?php

use App\Http\Controllers\ProjectController;
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

Route::get('/', [ProjectController::class, 'home'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('show');
Route::get('/category/{category}', [ProjectController::class, 'index'])->name('category');
