<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/books')->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('books', BookController::class);

    Route::post('books/{book}/add-to-library', [BookController::class, 'addToLibrary'])->name('books.addToLibrary');
    Route::post('books/{book}/mark-as-read', [BookController::class, 'markAsRead'])->name('books.markAsRead');
    Route::post('books/{book}/mark-as-unread', [BookController::class, 'markAsUnread'])->name('books.markAsUnread');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
