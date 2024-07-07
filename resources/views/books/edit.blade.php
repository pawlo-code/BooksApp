<!-- resources/views/books/edit.blade.php -->
<x-app-layout>
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="published_year">Published Year</label>
                <input type="number" name="published_year" id="published_year" class="form-control" value="{{ $book->published_year }}" required min="1500" max="{{ date('Y') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $book->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
</x-app-layout>
