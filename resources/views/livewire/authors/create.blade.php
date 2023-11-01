<x-layout>
    <form action="{{route('authors.store')}}" method="POST">
        @csrf
        <h2 class="mb-4">Create a new author</h2>
        <div class="mb-4">
            <div>
                <label>
                    First name
                    <x-input name="first_name" placeholder="First name" />
                </label>
            </div>

            <div>
                <label>
                    Second name
                    <x-input name="second_name" placeholder="Second name" />
                </label>
            </div>

            <div>
                <label>
                    Surname
                    <x-input name="surname" placeholder="Surname" />
                </label>
            </div>
        </div>

        @if($errors->all())
            <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
                <p class="font-bold">Error</p>
                @foreach($errors->all() as $error)
                    <p class="">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <button class="bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 h-10">
            Create author
        </button>

    </form>
</x-layout>
