@extends("app.layout")


@section("content")

@php

use App\Http\Controllers\TaskController;
$deadline = strtotime($task->deadline);
$comments = app(TaskController::class)->getComments($task->id);

@endphp


<div class="w-full h-full flex flex-col justify-start py-14 px-16 gap-4">
    <div class="w-full flex justify-start items-center">
        <div class="flex flex-col justify-start items-start gap-2">
            <div class="flex justify-start items-center gap-2">
                <x-icons.task size="36" />
                <x-ui.title>{{$task->name}}</x-ui.title>
            </div>
            <p class="text-sm text-dark-gray">{{$task->description}}</p>
            <div class="flex justify-start items-center gap-3 mt-4">
                <x-ui.boxIcon type="project" content="{{$project->name}}" />
                <x-ui.boxIcon type="deadline" content="{{date('M. d, Y',$deadline)}}" />
            </div>
        </div>
    </div>

    <div class="flex justify-start items-center gap-2">
        <x-task.button :task="$task" color="cyan-600" status=0>To Do</x-task.button>
        <x-task.button :task="$task" color="orange-600" status=1>In progress</x-task.button>
        <x-task.button :task="$task" color="purple-600" status=2>In revision</x-task.button>
        <x-task.button :task="$task" color="green-600" status=3 stylecss="pointer-events-none">
            <div class="flex justify-center items-center gap-2">
                <x-icons.lock size=16/>
                <p>Completed</p>
            </div>
        </x-task.button>
    </div>
    <div>
        <p class="font-semibold mb-2 mt-8">Add a comment :</p>
        <div class="p-3">
            <div class="flex flex-col rounded-xl w-[38rem] min-h-32 p-3 gap-1 shadow-project">
                <form action="{{ route('comment.store',["id" => $task->id])}}" method="post">
                    @csrf
                    <textarea class="w-full outline-none bg-gray-100 min-h-25 resize-none rounded-2xl p-2 " id="content" name="content" rows="3" placeholder="Write your comment here..."></textarea>
                
                    <div class="flex flex-row justify-end items-center">
                        <button class="bg-red rounded-xl px-4 py-1 font-semibold text-white">
                            <div class="flex justify-center items-center gap-2">
                                <x-icons.send size=20/>
                                <p>Publish</p>
                            </div>  
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    <div class="flex w-[42rem] flex-col gap-2 justify-start items-start mt-4">
        <p class="font-semibold">Comments :</p>
        <div class="w-full flex flex-col justify-start p-3 items-start gap-4 max-h-80 overflow-y-auto">
            @foreach ($comments as $comment)
            <x-task.commentary :comment="$comment"></x-task.commentary>
            @endforeach
        </div>
    </div>

</div>

@endsection