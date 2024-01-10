@props(['name' => null,
        'id' => null,
        'description'=> "This project do not have a description",
        'deadline'=> null])

@php
$date = strtotime($deadline);
@endphp

@if ($name != null and $deadline != null and $id != null)
<div class="w-[24rem] h-56 flex flex-col justify-start items-start bg-gray-100 rounded-2xl shadow-project p-4 gap-3">
    <p class="font-bold text-black text-xl">{{$name}}</p>
    <p class="text-dark-gray text-sm line-clamp-2">{{$description}}</p>

    <x-project_card.date date="{{date('m/d/Y', $date)}}" />
    <x-ui.divider />

    <div class="w-full flex justify-start items-center gap-3">
        <x-project_card.people id="{{$id}}"></x-project_card.people>
        <div class="flex flex-col flex-1 justify-center items-start">
            <p class="text-sm text-dark-gray">X tasks left</p>
            <x-project_card.progress progress=45 />
        </div>
    </div>
</div>
@endif
