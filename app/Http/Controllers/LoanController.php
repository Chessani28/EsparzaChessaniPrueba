<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'client_id' => 'required|exists:users,id',
        'book_id' => 'required|exists:books,id',
        'desired' => 'required|date',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
    ]);

    Loan::create([
        'client_id' => $request->client_id,
        'book_id' => $request->book_id,
        'desired' => $request->desired,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);

    return redirect()->back()->with('status', 'Loan created successfully!');
}

}
