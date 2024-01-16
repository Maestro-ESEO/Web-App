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

            <form action="" class="mt-3">
                <select name="status" id="status" class="border border-black text-left py-1 rounded-lg w-48 pl-2">
                    <option {{ $task->status == 0 ? 'selected' : '' }} value="to-do">To do</option>
                    <option {{ $task->status == 1 ? 'selected' : '' }} value="in-progress">In progress</option>
                    <option {{ $task->status == 2 ? 'selected' : '' }} value="in-revision">In revision</option>
                    <option {{ $task->status == 3 ? 'selected' : '' }} value="completed">Completed </option>
                </select>
                <x-task.button>
                    Update
                </x-task.button>
            </form>
        </div>

    </div>
    <p class="font-semibold mt-20">Commentaires :</p>
    <div class="w-full flex flex-col justify-center items-start gap-4">
        <div class="w-[38rem] flex flex-col justify-start items-start bg-gray-100  rounded-xl p-4 min-h-24 gap-3">
            <div class="flex justify-start items-center gap-2">
                <x-project-card.circle name="John Doe" url="https://i.pravatar.cc/150?img=68" />
                <div class="flex flex-col justify-start items-start">
                    <div class="flex justify-start items-center gap-1">
                        <p class="font-semibold">John Doe</p>
                        <x-icons.crown size="16" />
                    </div>
                    <p class="text-xs text-dark-gray">12/02/2023</p>
                </div>
            </div>
            <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ab, facere fugit corporis dignissimos ducimus repellat voluptatum voluptates consequuntur commodi laborum aspernatur natus, enim sint laudantium molestiae praesentium eaque nesciunt.</p>
        </div>

        <div class="w-[38rem] flex flex-col justify-start items-start bg-gray-100  rounded-xl p-4 min-h-24 gap-3">
            <div class="flex justify-start items-center gap-2">
                <x-project-card.circle name="Edouard Doe" url="https://i.pravatar.cc/150?img=12" />
                <div class="flex flex-col justify-start items-start">
                    <p class="font-semibold">Edouard Doe</p>
                    <p class="text-xs text-dark-gray">12/02/2023</p>
                </div>
            </div>
            <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ab, facere fugit corporis dignissimos ducimus repellat voluptatum voluptates consequuntur commodi laborum aspernatur natus, enim sint laudantium molestiae praesentium eaque nesciunt.</p>
        </div>

    </div>
</div>

@endsection