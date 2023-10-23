<div class="rounded-md border border-slate-300 bg-white p-3 shadow-sm mb-4">
    <div class="mb-4 flex justify-between">
        <h2 class="text-lg front-medium">{{ $author->second_name }} {{ $author->first_name }} {{ $author->surname }}</h2>
    </div>

    <div class="mb-4 flex items-center justify-between text-sm text-slate-500">
        <div class="flex space-x-4 items-center">
            <div>Was born {{ $author->created_at->diffForHumans() }}</div>
        </div>

        <div class="flex space-x-4 items-center">
            <div>Written {{ $author->books()->count() }} books</div>
        </div>

        <a class="rounded-md px-7 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10" href="{{ route('authors.edit', ['author' => $author]) }}" wire:navigate>Edit</a>

        <form action="{{ route('authors.destroy', ['author' => $author]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="rounded-md px-7 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10">Delete author</button>
        </form>

    </div>

    {{ $slot }}

</div>
