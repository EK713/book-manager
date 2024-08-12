
<!-- resources/views/books/create.blade.php -->
@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Add New Book</h1>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
