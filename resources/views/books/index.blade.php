<!-- resources/views/books/index.blade.php -->

@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Cover</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->photo }}
            <img src="{{ asset('storage/' . $book->photo) }}" alt="Book Photo" class="img-thumbnail"> </td>
            <td>
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

