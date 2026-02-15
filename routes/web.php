<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::resource('book', BookController::class);

Route::get('/' , function() {
    return view("index");
})->name("index");

Route::get('/contact' , function() {
    return view("contact");
})->name("contact");

Route::get('/about' , function() {
    return view("about");
})->name("about");

Route::get('/books/details' , function() {
    return view("books.details");
})->name("details");

// show all books
Route::get('/indexBook', [BookController::class, 'index'])->name('bookIndex');
// add book 
Route::get('/addNewBook', [BookController::class, 'create'])->name('addBook');
Route::post('/books', [BookController::class, 'store'])->name('book.store');
// delete books 
Route::delete('/destroyBook/{id}', [BookController::class, 'destroy'])->name('destroyBook');
// edit book
Route::get('/editBook/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('book.update');
// send books and pagination to search page
Route::get('/books/search',[BookController::class, 'search'])->name('search');
//
Route::get('/books/search/find',[BookController::class, 'find'])->name('search.find');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
