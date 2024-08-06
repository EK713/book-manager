<!-- resources/views/books/index.blade.php -->

<h1>Books</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Author</th>
            <th>Price</th>
            <th>Published Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->published_date }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}">Show</a>
                    <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('books.create') }}">Create New Book</a>