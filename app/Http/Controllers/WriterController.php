<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $autor = new Writer();
        $autor->name = $validatedData['name'];
        $autor->save();

        return redirect()->back()->with('status', 'Autor creado exitosamente!');
    }
}
