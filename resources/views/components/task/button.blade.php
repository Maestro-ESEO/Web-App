@props(['selected' => false,
        'color' => 'black',
        'stylecss' => ''])



@if($selected)
<button class="border-2 border-{{$color}} bg-{{$color}} {{$stylecss}} cursor-default	 text-white h-8 rounded-lg px-2">
    {{$slot}}
</button>
@else
<button class="border-2 border-{{$color}} {{$stylecss}} text-dark-gray h-8 rounded-lg px-2">
    {{$slot}}
</button>
@endif