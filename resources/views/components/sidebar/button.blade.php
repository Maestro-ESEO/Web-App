@props([
    "href" => null,
    "method" => "get"
])


@php

$selected = request()->path() == $href;

@endphp


@if ($href != null)
    <form action={{ url($href) }} method="{{ $method }}" class="w-full">
        @csrf
        <button class="w-full px-4 py-1 flex items-center gap-2 text-md hover:text-black hover:bg-light-gray rounded-lg transition-all {{ $selected ? "text-black" : "text-dark-gray" }}">
            {{ $slot }}
        </button>
    </form>
@endif