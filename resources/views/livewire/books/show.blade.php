<x-layout>
    <div class="rounded-md border border-slate-300 bg-white p-3 shadow-sm mb-4">
        <a href="{{ route('books.index') }}" wire:navigate>
            ← BACK
        </a>
    </div>

    <div class="mb-4">
        <h1 class="sticky top-0 mb-10 text-2xl">{{ $book->name }}</h1>

        <img class="mb-6" src="{{ asset($book->image) }}" />

        <p class="text-xl mb-2 text-slate-700 font-medium">Description:</p>
        <div class="mb-8 text-lg indent-8">
            {{ $book->description }}
        </div>

        <p class="mb-4 text-lg font-semibold">Written</p>
        <div>
            @foreach($book->authors as $author)
                <div class="mb-4 text-lg">by
                    {{ $author->first_name }}
                    {{ $author->second_name }}
                    {{ $author->surname }}
                </div>
            @endforeach

            <div class="my-10">
                Book was published in
                {{ $book->dateOfPublished->format('M j, Y') }}
            </div>
        </div>
    </div>

</x-layout>
