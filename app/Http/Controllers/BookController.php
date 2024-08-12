<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'description' => $request->input('description'),
        ]);

        dd($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}

