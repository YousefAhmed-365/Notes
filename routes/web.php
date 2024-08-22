<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoteController;
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

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::get('/search', [DashboardController::class, 'search'])->name('index.search');

Route::get('/notes/{note}', [NoteController::class, 'show'])->name('note.show');

Route::post('/note/store', [NoteController::class, 'store'])->name('note.store')->middleware('auth');

Route::delete('/note/destroy/{note}', [NoteController::class, 'destroy'])->name('note.destroy')->middleware('auth');


Route::post('/note/comment/store', [CommentController::class, 'store'])->name('note.comment.store')->middleware('auth');

Route::delete('/note/comment/destroy/{comment}', [CommentController::class, 'destroy'])->name('note.comment.destroy')->middleware('auth');

Route::get('/login', [AuthController::class, 'loginIndex'])->name('auth.loginIndex')->middleware('guest');

Route::get('/register', [AuthController::class, 'registerIndex'])->name('auth.registerIndex')->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

Route::get('/logout', function () {
    return redirect()->route('index');
})->name('auth.logout.invalid');