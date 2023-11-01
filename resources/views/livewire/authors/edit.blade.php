<x-layout>
    <form action="{{route('authors.update', ['author' => $author])}}" method="POST">
        @csrf
        @method('PUT')

        <h2 class="mb-4">Edit old author</h2>

        <div class="mb-4">
            <div>
                <label>
                    First name
                    <x-input name="first_name" placeholder="First name" :value="$author->first_name" />
                </label>
            </div>

            <div>
                <label>
                    Second name
                    <x-input name="second_name" placeholder="Second name" :value="$author->second_name" />
                </label>
            </div>

            <div>
                <label>
                    Surname
                    <x-input name="surname" placeholder="Surname" :value="$author->surname" />
                </label>
            </div>
        </div>

        <button class="bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 h-10">
            Edit author
        </button>

    </form>
</x-layout>
