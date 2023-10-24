<x-layout>
    <div class="mb-6">
        <a class="rounded-md border border-slate-300 p-2 bg-white text-slate-500" href="{{ route('authors.create') }}" wire:navigate>Add a new author</a>
    </div>

    <form action="{{ route('authors.index') }}" method="GET" class="mb-4 flex items-center space-x-2">
        <label>
            <input type="text" name="name" placeholder="Search by name"
                   value="{{ request('name') }}" class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-md border-slate-300 h-10" />
        </label>
        <button type="submit" class="bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 h-10">Search</button>
        <a href="{{ route('authors.index') }}" class="bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 h-10" wire:navigate>Clear</a>
    </form>

    @foreach($authors as $author)
        <x-card-author :author="$author">

        </x-card-author>


    @endforeach

    <div>
        @if ($authors->count())
            <nav>
                {{ $authors->links() }}
            </nav>
        @endif
    </div>
</x-layout>
