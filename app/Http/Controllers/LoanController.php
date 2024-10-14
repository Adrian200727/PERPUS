<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    // LoanController.php
    public function borrow($id)
    {
      

        $book = Book::findOrFail($id);
        if ($book->stock > 0) {
            $book->stock--;
            $book->save();

            Loan::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'borrowed_at' => now(),
            ]);

            return redirect()->route('books.index')->with('success', 'books berhasil dipinjam.');
        }

        return redirect()->route('books.index')->with('error', 'Stok books habis.');
    }

    public function return($id)
    {
        $loan = Loan::where('book_id', $id)->where('user_id', auth::id())->whereNull('returned_at')->first();
        if ($loan) {
            $loan->returned_at = now();
            $loan->save();

            $book = $loan->book;
            $book->stock++;
            $book->save();

            return redirect()->route('books.index')->with('success', 'books berhasil dikembalikan.');
        }

        return redirect()->route('books.index')->with('error', 'Peminjaman tidak ditemukan.');
    }

}
