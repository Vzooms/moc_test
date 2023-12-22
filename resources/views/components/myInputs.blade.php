<label for={{ $id }} class="text-lg">{{ $text }}</label>

<input value="{{ $defValue }}" type={{ $type }} id={{ $id }} name={{ $id }}
    class="col-span-2 neumorphism neumorphismH px-4 py-2 outline-none">

@if ($errors->first($id))
    <p></p>
    <p class="text-red-500 col-span-2">
        {{ $errors->first($id) }}
    </p>
@endif
