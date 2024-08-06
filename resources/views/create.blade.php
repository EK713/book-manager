<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<h1>Create New Book</h1>

<form action="{{ route('books.store') }}" method="post">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author"><br><br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price"><br><br>
    <label for="published_date">Published Date:</label>
    <input type="date" id="published_date" name="published_date"><br><br>
    <input type="submit" value="Create">
</form>

</html>