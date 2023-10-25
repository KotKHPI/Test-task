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
        return view('livewire.books.index', ['books' => Book::all()]);
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

//        dd($authors);

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
