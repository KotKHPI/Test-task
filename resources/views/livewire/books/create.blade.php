<x-layout>

    <x-error/>

    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="mb-4">Create a new book</h2>

        <div class="mb-4">
            <div>
                <label>
                    Name of book
                    <x-input name="name" placeholder="Name of book" />
                </label>
            </div>

            <div>
                <label>
                    Description
                    <x-input name="description" placeholder="Not necessary" />
                </label>
            </div>

            <div>
                <label>
                    Image (not bigger 2 mb)
                    <x-input name="image" type="file" />
                </label>
            </div>

            <div>
                <label>
                    Date of published
                    <x-input name="date" type="date" />
                </label>
            </div>

            <div>
                <label>
                    Authors
                    @foreach($authors as $author)
                        <div>
                            <label>
                                <input type="checkbox" name="authors[]" value="author-{{$author->id}}">
                                {{$author->first_name}}
                            </label>
                        </div>
                    @endforeach
                </label>

            </div>

        </div>

        <button class="bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 h-10">
            Create the book
        </button>

    </form>

</x-layout>
