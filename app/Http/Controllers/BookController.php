<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');

        $books = Book::when($search, fn($query, $search) => $query->searchByNameOrAuthor($search));
        $books->sortByName();
        $books = $books->paginate(15);
        return view('livewire.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.books.create', ['authors' => Author::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $validate = $request->validated();

        $authors = $request->input('authors');

        for($i = 0; $i < count($authors); $i++) {
            $authors[$i] = preg_replace("/[^0-9]/", '', $authors[$i]);
        }

        $authors = Author::find($authors);

        $hasFile = $request->hasFile('image');
        $path = null;

        if($hasFile) {
            $path = $request->file('image')->store('images');
        }

        $book = Book::create([
            'name' => $validate['name'],
            'description' => $validate['description'],
            'image' => $path,
            'dateOfPublished' => $validate['date']
        ]);

        $book->authors()->attach($authors);

        return redirect()->route('books.index')->with('success', "Book was created!");

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('livewire.books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('livewire.books.edit', ['book' => $book, 'authors' => Author::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());

        if($request->input('date')) {
            $newDate = $request->input('date');
            $book->dateOfPublished = $newDate;
        }

        $oldAuthors = $book->authors->pluck('id');
        $newAuthors = $request->input('authors');

        for($i = 0; $i < count($newAuthors); $i++) {
            $newAuthors[$i] = preg_replace("/[^0-9]/", '', $newAuthors[$i]);
        }

        if($newAuthors != $oldAuthors) {
            $book->authors()->detach($oldAuthors);
            $book->authors()->attach($newAuthors);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $book->image = $path;
        }

        $book->save();

        return redirect()->route('books.show', ['book' => $book])->with('success', 'Book was edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $authors = Author::find($book->authors);
        $book->authors()->detach($authors);
        $book->delete();

        return redirect()->route('books.index')->with('success', "Book was deleted");
    }
}
