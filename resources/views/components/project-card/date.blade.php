@props([
    'type' => 'deadline',
    'date' => null
])

@if($type == 'deadline')
<div class="w-32 h-8 flex flex-row justify-center items-center border border-dark-gray rounded-lg gap-2 text-dark-gray">
    <x-icons.deadline class="stroke-dark-gray" size=16 />
    <p class="text-sm">{{$date}}</p>
</div>
@elseif ($type == 'creation')
<div class="w-32 h-8 flex flex-row justify-center items-center border border-dark-gray rounded-lg gap-2 text-dark-gray">
    <x-icons.creation class="stroke-dark-gray" size=16 />
    <p class="text-sm">{{$date}}</p>
</div>
@endif