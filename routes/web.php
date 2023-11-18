<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'loginIndex']);
    Route::get('/register', [AuthController::class, 'registerIndex'])->name('register.index');
    Route::post('/register/store', [AuthController::class, 'register'])->name('register.store');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/change/password', [ProfileController::class, 'changePassword'])->name('change.password');
    Route::patch('/change/password/store', [ProfileController::class, 'passwordStore'])->name('password.update');

    // post route
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/destroy/{uuid}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/{uuid}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{uuid}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/post/{uuid}', [PostController::class, 'show'])->name('post.single');

    // comment route
    Route::post('/comment/store/{post_id}', [CommentController::class, 'store'])->name('comment.store');
});

require __DIR__ . '/auth.php';
