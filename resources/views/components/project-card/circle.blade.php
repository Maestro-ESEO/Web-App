@props([
    'stylecss' => null,
    'name' => null,
    'url' => null,
    'tooltip' => false

])

<div class="h-9 w-9 rounded-full {{$stylecss}} relative inline-block group">
    @if (isset($url))
        <img draggable="false" src="{{$url}}" class="w-full h-full object-cover rounded-full" alt="Image">
    @endif
    @if($tooltip)
        <x-ui.tooltip text="{{$name}}" bottom="2"/>
    @endif
    
</div>