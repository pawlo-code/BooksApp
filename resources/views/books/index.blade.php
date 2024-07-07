<!-- resources/views/books/index.blade.php -->
<x-app-layout>
    <div class="container">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
        <ul>
            @foreach($books as $book)
                <li>
                    {{ $book->title }} by {{ $book->author }}
                    <div>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning" style="margin-left: 10px;">Edit</a>
                    @if(auth()->user()->books->contains($book->id))
                        @if(auth()->user()->books->find($book->id)->pivot->is_read)
                            <form action="{{ route('books.markAsUnread', $book) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-warning">Mark as Unread</button>
                            </form>
                        @else
                        <form action="{{ route('books.markAsRead', $book) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-success">Mark as Read</button>
                        </form>
                        @endif
                    @else
                        <form action="{{ route('books.addToLibrary', $book) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add to Library</button>
                        </form>
                    @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
