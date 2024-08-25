<!-- resources/views/books/index.blade.php -->

@extends('layout')
@section('content')

<div class="container mt-5">
    <h1>New Books</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    


    <!-- <p>Debug: Is books set? {{ isset($books) ? 'Yes' : 'No' }}</p>
    <p>Debug: Books count: {{ isset($books) ? $books->count() : 'N/A' }}</p> -->

    <table class="table table-bordered">
        <theah>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Publisher</th>
            <th>Cover</th>
            <th width="280px">Action</th>
        </tr>
        </theah>

    @if(isset($books) && $books->count() > 0)
    @foreach ($books as $book)
        <tbody>
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->user_id ? $book->user->name : '' }}</td>
            <td>
            @if($book->photo)
                            <img src="{{ asset('storage/' . $book->photo) }}" alt="Book Cover" class="img-thumbnail" style="max-width: 100px;">
                        @else 
                        <p>No photo</p> 
                        @endif 
           
            </td>
            <td>
            <a class="btn btn-info" href="{{ route('books.show', $book->id) }}">Show</a>
                   
                @if($book->user_id === Auth::id())
                    <a class="btn btn-info" href="{{ route('books.edit', $book->id) }}">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                 @endif 

                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No books found. (Debug: {{ isset($books) ? 'Books variable is set but empty' : 'Books variable is not set' }})</p>
        @endif

        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
</div>
@endsection

