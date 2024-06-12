<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'loans';

    protected $fillable = [
        'id',
        'client_id',
        'book_id',
        'desired',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'return_date',

    ];
}
