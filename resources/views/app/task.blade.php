@extends("app.layout")


@section("content")

@php
$deadline = strtotime($task->deadline);
@endphp
<div class="w-full h-full flex flex-col justify-start py-14 px-16 gap-4">
    <div class="w-full flex justify-start items-center">
        <div class="flex flex-col justify-start items-start gap-2">
            <div class="flex justify-start items-center gap-2">
                <x-icons.task size="36" />
                <x-ui.title>{{$task->name}}</x-ui.title>
            </div>
            <p class="text-sm text-dark-gray">{{$task->description}}</p>
            <div class="flex justify-start items-center gap-3">
                <x-project-card.date type="deadline" date="{{date('M. d, Y',$deadline)}}" />
            </div>

            <div>
                <x-task.button>Modifier le Statut</x-task.button>
            </div>
        </div>

    </div>
</div>

@endsection