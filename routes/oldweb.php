<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('book', BookController::class);

Route::get('/' , function() {
    return view("index");
})->name("index");

Route::get('/contact' , function() {
    return view("contact");
})->name("contact");


Route::get('/books' , function() {
    return view("books");
})->name("books");

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