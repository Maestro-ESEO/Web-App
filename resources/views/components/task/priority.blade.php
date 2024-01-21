@props([
    'priority' => null,
    'color' => null
])

@php

    if(isset($priority)){
        switch ($priority) {
            case 0:
                $color="bg-green-600";
                break;
            case 1:
                $color="bg-amber-600";
                break;
            case 2:
                $color="bg-red";
                break;
            default:
                $color="bg-grey-600";
                break;
    }
   
}
@endphp

@if(isset($priority))
    <div class="h-5 w-5 rounded-full {{$color}} "></div>
@endif