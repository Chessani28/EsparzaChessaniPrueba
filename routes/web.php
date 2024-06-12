<?php

use App\Http\Controllers\booksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth/login');
});

Auth::routes();

Route::get('/home', function () {
    $categorias = \App\Models\Category::all();
    $editoriales = \App\Models\Editorial::all();
    $clientes = \App\Models\User::all();
    $libros = \App\Models\Books::all(); 
    
    return view('home', compact('categorias', 'editoriales','clientes','libros'));
})->middleware('admin');

Route::get('/home2', function () {
    $categorias = \App\Models\Category::all();
    $editoriales = \App\Models\Editorial::all();
    return view('home2', compact('categorias', 'editoriales'));
})->middleware('client');
