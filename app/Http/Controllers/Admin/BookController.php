<?php

// Admin/BookController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('Admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('Admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Book::create($request->all());

        return redirect()->route('Admin.books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('Admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('Admin.books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('Admin.books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
