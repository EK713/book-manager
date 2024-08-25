<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));

    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
    
        $userId = Auth::id();

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'description' => 'nullable|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        

            $book = new Book();
            $book->title = $validated['title'];
            $book->author = $validated['author'];
            $book->description = $validated['description'];
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photo', 'public'); 
                $validated['photo'] = $photoPath; 
            }
            $book->user_id = $userId; 
            $book->save();

            return redirect()->route('books.index')->with('success!', 'Book created successfully!');
        
    }

    public function show(book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {

        Auth::id();
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'description' => 'nullable|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $book->update($validated);
    
            return redirect()->route('books.index')->with('success', 'Book updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function destroy(Book $book)
    {
     
        Auth::id();

        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}

