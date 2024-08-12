<!-- resources/views/books/edit.blade.php -->

@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $book->description }}</textarea>
        </div>
        <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
        @error('photo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
</br>
        <button type="submit" class="btn btn-success">Update</button> <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
