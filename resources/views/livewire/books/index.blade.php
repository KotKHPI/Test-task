<x-layout>

    <h2 class="mb-6 rounded-md px-7 py-1 text-right font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10">
        Book's page
    </h2>

    <div class="mb-6">
        <a class="rounded-md border border-slate-300 p-2 bg-white text-slate-500" href="{{ route('books.create') }}" wire:navigate>Add a new book</a>
    </div>

    <form action="{{ route('books.index') }}" method="GET" class="mb-8 flex items-center space-x-2">
        <label>
            <input type="text" name="name" placeholder="Search by book/author"
                   value="{{ request('name') }}" class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-md border-slate-300 h-10" />
        </label>
        <button type="submit" class="bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 h-10">Search</button>
        <a href="{{ route('books.index') }}" class="bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 h-10" wire:navigate>Clear</a>
    </form>

{{--    <img src="{{ asset('images/VagcGUBQya7aioEiToWWyKMqhwoQDv6fC5QibzAP.png') }}" alt="description">--}}

    @foreach($books as $book)
        <x-card-book :book="$book">

        </x-card-book>

    @endforeach
</x-layout>
