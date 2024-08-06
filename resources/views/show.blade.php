<!-- resources/views/books/show.blade.php -->

<h1>Book Details</h1>

<p>Name: {{ $book->name }}</p>
<p>Author: {{ $book->author }}</p>
<p>Price: {{ $book->price }}</p>
<p>Published Date: {{ $book->published_date }}</p>

<a href="{{ route('books.index') }}">Back to Books</a>

