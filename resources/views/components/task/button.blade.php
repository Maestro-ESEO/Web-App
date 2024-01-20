@props(['selected' => false,
'color' => 'black',
'stylecss' => '',
'status' => -1,
'task' => null])

@php

//Verifier si le statut est le même 
$selected = $task ? ($task->status == $status) : false;
$clickable = $task ? ($task->status == 3) : false;

@endphp


@if($task)
    @if($selected)
        <button class="border-2 border-{{$color}} bg-{{$color}} {{$stylecss}} cursor-default text-white h-8 rounded-lg px-2">
            {{$slot}}
        </button>
    @else
        <form action="{{ route('update.status', ['id' => $task->id, 'status' => $status]) }}" method="post">
            @csrf
            <button class="border-2 border-{{$color}} {{$stylecss}} text-{{$color}} {{$clickable ? 'pointer-events-none' : ''}} h-8 rounded-lg px-2" type="submit">
                {{$slot}}
            </button>
        </form>
    @endif
@endif