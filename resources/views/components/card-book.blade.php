<div class="rounded-md border border-slate-300 bg-white p-3 shadow-sm mb-4">
    <div class="mb-4 flex justify-between">
        <a href="{{ route('books.show', ['book' => $book]) }}" wire:navigate>
            <h2 class="text-lg front-medium">{{ $book->name }}</h2>
        </a>
    </div>

    <div class="mb-4 flex items-center justify-between text-sm text-slate-500">
        <div class="flex space-x-4 items-center">
            <div>Published {{ $book->dateOfPublished }}</div>
        </div>

        <div class="flex space-x-4 items-center">
            <div>Have {{ $book->authors()->count() }} authors</div>
        </div>

        <a class="rounded-md px-7 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10" href="{{ route('books.edit', ['book' => $book]) }}" wire:navigate>Edit</a>

        <form action="{{ route('books.destroy', ['book' => $book]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="rounded-md px-7 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10">Delete book</button>
        </form>

    </div>

    {{ $slot }}

</div>
