<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'loginIndex']);
Route::get('/login', [AuthController::class, 'loginIndex'])->name('login.index');
Route::get('/register', [AuthController::class, 'registerIndex'])->name('register.index');
Route::post('/register/store', [AuthController::class, 'register'])->name('register.store');
