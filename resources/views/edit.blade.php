<!-- resources/views/books/edit.blade.php -->

<h1>Edit Book</h1>

<form action="{{ route('books.update', $book->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $book->name }}"><br><br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" value="{{ $book->author }}"><br><br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value="{{ $book->price }}"><br><br>
    <label for="published_date">Published Date:</label>
    <input type="date" id="published_date" name="published_date" value="{{ $book->published_date }}"><br><br>
    <input type="submit" value="Update">
</form>