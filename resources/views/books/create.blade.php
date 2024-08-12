
<!-- resources/views/books/create.blade.php -->
@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Add New Book</h1>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
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
        <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
        @error('photo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

@endsection
