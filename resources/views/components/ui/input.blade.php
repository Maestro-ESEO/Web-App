@php
    if (!isset($value)) {
        $value = old($name);
    }
@endphp


<div class="w-full flex flex-col items-start justify-start gap-2">
    <label for="{{ $name }}" class="flex flex-row items-center justify-start gap-2 font-semibold text-md text-dark-gray">
        {{ $slot }}
    </label>

    <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" class="rounded-xl bg-light-gray py-2 px-4 w-full text-md shadow-input">

    <p class="text-sm text-red font-semibold -mt-2">
        @error($name)
        {{ $message }}
        @enderror
    </p>
</div>