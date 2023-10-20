{{--<input type="text" name="first_name" placeholder="First name"--}}
{{--       value="{{ old('first_name') }}" class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-md border-slate-300 h-10" />--}}

<input placeholder="{{ $placeholder }}" type="{{ $type }}"
       name="{{ $name }}" value="{{ old("$name", "$value") }}" id="{{$name}}"
    @class(['mb-4 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
        'ring-slate-300' => !$errors->has($name),
        'ring-red-300' => $errors->has($name)]) />
