@props(['name' => null,
        'id' => null,
        'description'=> "This project does not have a description",
        'deadline'=> null])

@php

use App\Http\Controllers\ProjectController;
$date = strtotime($deadline);

//Get Tasks of the project
$projectController = new ProjectController();
$data = json_decode($projectController->getProgression($id)->getContent(), true);
$progression = $data['status'] == 200 ? $data['data'] : null;
@endphp

@if ($name != null and $deadline != null and $id != null)
<div class="w-[24rem] h-56 flex flex-col justify-start items-start bg-gray-100 rounded-2xl shadow-project p-4 gap-3">
    <p class="font-bold text-black text-xl">{{$name}}</p>
<p class="text-dark-gray text-sm min-h-10 line-clamp-2">{{$description}}</p>

    <x-project_card.date date="{{date('m/d/Y', $date)}}" />
    <x-ui.divider />

    <div class="w-full flex justify-start items-center gap-3">
        <x-project_card.people id="{{$id}}"></x-project_card.people>
        <div class="flex flex-col flex-1 justify-center items-start">
            <p class="text-sm text-dark-gray">{{$progression['tasks_unfinished']}} tasks left</p>
            <x-project_card.progress progress="{{$progression['progression']}}" />
        </div>
    </div>
</div>
@endif
