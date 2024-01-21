@props([
'type' => '',
'content' => null,
'href' => ''
])

@php
$type = 'icons.' . $type;
@endphp
@if($href)
<a href="{{$href}}">
@endif
    <div
        class="px-2 h-8 flex flex-row justify-center items-center border border-dark-gray rounded-lg gap-2 text-dark-gray">
        <x-dynamic-component :component="$type" size=16 />
        <p class="text-sm">{{$content}}</p>
    </div>
@if($href)
</a>
@endif
