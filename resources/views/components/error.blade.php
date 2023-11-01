@if($errors->all())
    <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
        <p class="font-bold">Error</p>
        @foreach($errors->all() as $error)
            <p class="">{{ $error }}</p>
        @endforeach
    </div>
@endif
