<?php

use App\Http\Controllers\booksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\WriterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/libros', [BooksController::class, 'store'])->name('libros.store');
Route::get('/libros/create/editorial', [BooksController::class, 'createEditorial'])->name('libros.editorial');
Route::get('/libros/create/categoria', [BooksController::class, 'createCategory'])->name('libros.categorias');
Route::get('/libros/search', [BooksController::class, 'search'])->name('libros.search');

Route::post('/autores', [WriterController::class, 'store'])->name('autores.store');
Route::post('/categorias', [CategoriesController::class, 'store'])->name('categorias.store');
Route::post('/editoriales', [EditorialController::class, 'store'])->name('editoriales.store');

Route::post('/loans/store', [LoanController::class, 'store'])->name('loans.store');

Route::get('/home2', [booksController::class, 'index'])->name('dashboard');
Route::get('/books/search', [booksController::class, 'search'])->name('books.search');
