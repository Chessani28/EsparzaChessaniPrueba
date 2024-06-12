<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categoria = new Category();
        $categoria->name = $validatedData['name'];
        $categoria->save();

        return redirect()->back()->with('status', 'Categoría creada exitosamente!');
    }
}
