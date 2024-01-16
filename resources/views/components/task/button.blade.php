@props(['selected' => false,
        'color' => 'black'])

@if($selected == true)
<button class="border-2 border-{{$color}} bg-{{$color}} text-white h-8 rounded-lg px-4">
    {{$slot}}
</button>
@else
<button class="border-2 border-{{$color}} text-dark-gray h-8 rounded-lg px-4">
    {{$slot}}
</button>
@endif