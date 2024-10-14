<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'user_id',
        'book_id',
        'borrowed_at',
        'returned_at',
    ];

    // Relasi ke model Book (Many-to-One)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relasi ke model User (Many-to-One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
