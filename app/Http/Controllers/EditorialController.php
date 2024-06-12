<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $editorial = new Editorial();
        $editorial->name = $validatedData['name'];
        $editorial->save();

        return redirect()->back()->with('status', 'Editorial creada exitosamente!');
    }

    
}
