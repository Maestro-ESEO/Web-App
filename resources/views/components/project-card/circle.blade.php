@props([
    'stylecss' => null,
    'name' => null,
    'url' => null

])

<div class="h-9 w-9 rounded-full {{$stylecss}} relative inline-block group">
    @if (isset($url))
        <img draggable="false" src="{{$url}}" class="w-full h-full object-cover rounded-full" alt="Image">
    <x-ui.tooltip text="{{$name}}"/>
    @endif
</div>