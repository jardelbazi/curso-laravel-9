<?php

use App\Http\Controllers\{
    CommentController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::put('/users/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::get('/users/{userId}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::get('/users/{userId}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/users/{userId}/comments/{id}', [CommentController::class, 'edit'])->name('comments.edit');
Route::post('/users/{userId}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');




Route::get('/', function () {
    return view('welcome');
});
