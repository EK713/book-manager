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
           
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'description' => 'nullable|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
            ]);
        
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public'); // Store file in storage/app/public/photos
                $validated['photo'] = $photoPath; // Add the path to the validated data
            }
        
            Book::create($validated);
        
            // Redirect to the index page with a success message
            return redirect()->route('books.index')->with('success', 'Book created successfully.');
            
            dd($request->all());

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

