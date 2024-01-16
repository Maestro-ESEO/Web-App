<div class="flex flex-col flex-1 justify-start items-center">
    <x-kanban.title color="{{$color}}">{{$slot}}</x-kanban.title>
    <div class="w-full flex flex-col justify-start items-center px-4 mt-4 gap-3">
        @foreach($tasks as $task)
            <x-kanban.card title="{{$task['name']}}" priority="{{$task['priority']}}" date="{{$task['deadline']}}" href="task/{{$task['id']}}" status="{{$task['status']}}"/>
        @endforeach
    </div>
</div>