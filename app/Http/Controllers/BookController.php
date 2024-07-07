<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'published_year' => 'required|integer|min:1500|max:' . date('Y'),
        ]);

        Book::create($validated);

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'published_year' => 'required|integer|min:1500|max:' . date('Y'),
        ]);

        $book->update($validated);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function addToLibrary(Book $book)
    {
        auth()->user()->books()->attach($book->id, ['is_read' => false]);
        return redirect()->route('books.index');
    }

    public function markAsRead(Book $book)
    {
        auth()->user()->books()->updateExistingPivot($book->id, ['is_read' => true]);
        return redirect()->route('books.index');
    }

    public function markAsUnread(Book $book)
    {
        auth()->user()->books()->updateExistingPivot($book->id, ['is_read' => false]);
        return redirect()->route('books.index');
    }
}