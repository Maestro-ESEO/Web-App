@props([
    'priority' => null,
    'color' => null,
    'size' => 1,
])

@php

    if(isset($priority)){
        switch ($priority) {
            case 0:
                $color="bg-green-600";
                $tooltip = "Moderate";
                break;
            case 1:
                $color="bg-amber-600";
                $tooltip = "High Priority";
                break;
            case 2:
                $color="bg-red";
                $tooltip = "Urgent";
                break;
            default:
                $color="bg-grey-600";
                $tooltip = "";
                break;
    }
   
}
@endphp

@if(isset($priority))
    <div class="relative inline-block group">
        <div class="h-{{ $size }} w-{{ $size }} rounded-full {{$color}} "></div>
        <x-ui.tooltip text="{{$tooltip}}" bottom="1.5"/>
    </div>
@endif