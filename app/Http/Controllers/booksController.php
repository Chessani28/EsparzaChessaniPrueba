<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use App\Models\Editorial;
use Illuminate\Http\Request;

class booksController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'quantity' => 'required|integer',
            'editorials_id' => 'required|integer',
        ]);

        $libro = new Books();
        $libro->title = $validatedData['title'];
        $libro->category_id = $validatedData['category_id'];
        $libro->quantity = $validatedData['quantity'];
        $libro->editorials_id = $validatedData['editorials_id'];
        $libro->save();

        echo 'No se guardo: '. $libro;

        return redirect()->back()->with('status', 'Libro creado exitosamente!');
    }
    public function createEditorial()
    {
        $editoriales = Editorial::all();
        return view('editoriales.create', compact('editoriales'));
    }

    public function createCategory()
    {
        $categorias = Category::all();
        return view('libros.create', compact('categorias'));
    }

    public function index()
    {
        $categorias = Category::all();
        $editoriales = Editorial::all();
        
        return view('home2', compact('categorias', 'editoriales'));
    }
    
    public function search(Request $request)
    {
        $query = Books::query();
    
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }
    
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }
    
        if ($request->filled('editorials_id')) {
            $query->where('editorials_id', $request->input('editorials_id'));
        }
    
        $books = $query->get();
    
        $categorias = Category::all();
        $editoriales = Editorial::all();
    
        return view('home2', compact('books', 'categorias', 'editoriales'));
    }
}
