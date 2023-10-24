<x-layout>
    @foreach($books as $book)
        <x-card-book :book="$book">

        </x-card-book>

    @endforeach
</x-layout>
