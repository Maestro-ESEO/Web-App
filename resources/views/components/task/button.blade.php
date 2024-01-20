@props(['selected' => false,
'color' => 'black',
'stylecss' => '',
'status' => -1,
'task' => null])


@if($task)
    @if($selected)
        <button class="border-2 border-{{$color}} bg-{{$color}} {{$stylecss}} cursor-default	 text-white h-8 rounded-lg px-2">
            {{$slot}}
        </button>
    @elseif($task->status != 3)
        <form action="{{ route('update.status', ['id' => $task->id, 'status' => $status]) }}" method="post">
            @csrf
            <button class="border-2 border-{{$color}} {{$stylecss}} text-dark-gray h-8 rounded-lg px-2" type="submit">
                {{$slot}}
            </button>
        </form>
    @else
        <button class="border-2 border-{{$color}} {{$stylecss}} text-dark-gray h-8 rounded-lg px-2" type="submit">
            {{$slot}}
        </button>
    @endif
@endif