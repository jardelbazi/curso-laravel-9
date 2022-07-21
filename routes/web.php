<?php

use App\Http\Controllers\{
    CommentController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('/users')->group(function() {
	Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
	Route::get('/{userId}/comments/create', [CommentController::class, 'create'])->name('comments.create');
	Route::get('/{userId}/comments', [CommentController::class, 'index'])->name('comments.index');
	Route::get('/{userId}/comments/{id}', [CommentController::class, 'edit'])->name('comments.edit');
	Route::post('/{userId}/comments', [CommentController::class, 'store'])->name('comments.store');

	Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
	Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
	Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
	Route::get('/create', [UserController::class, 'create'])->name('users.create');
	Route::get('/', [UserController::class, 'index'])->name('users.index');
	Route::get('/{id}', [UserController::class, 'edit'])->name('users.edit');
	Route::post('/', [UserController::class, 'store'])->name('users.store');
	Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
});



Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
