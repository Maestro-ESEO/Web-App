@props([
    'type' => '',
    'content' => null
])

@php
    $type = 'icons.' . $type;
@endphp
<div class="px-2 h-8 flex flex-row justify-center items-center border border-dark-gray rounded-lg gap-2 text-dark-gray">
    <x-dynamic-component :component="$type" size=16 />
    <p class="text-sm">{{$content}}</p>
</div>