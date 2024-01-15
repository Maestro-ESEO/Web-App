<div class="flex flex-col flex-1 justify-start items-center">
    <x-kanban.title color="{{$color}}">{{$slot}}</x-kanban.title>
    <div class="w-full flex flex-col justify-start items-center px-4 mt-4 gap-3">
        <x-kanban.card title="Tâche 1" priority=2 date="01/12/24"/>
    </div>
</div>