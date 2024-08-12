<!-- resources/views/books/show.blade.php -->

@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Show Book</h1>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
            <p class="card-text">{{ $book->description }}</p>
        </div>
    </div>
</div>
@endsection
