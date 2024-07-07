<!-- resources/views/books/show.blade.php -->
<x-app-layout>
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
        <p>{{ $book->description }}</p>
        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</x-app-layout>
