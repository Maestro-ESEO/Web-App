@props([
    "href" => null,
    "method" => "get"
])


@php

use App\Models\Task;

$selected = request()->path() == $href;

// Check if task is in the url
if (str_contains(request()->path(), 'task') && request()->route()->hasParameter('id')) {
    $task = Task::find(request()->route()->parameter('id'));
    if ($href == "project/".$task->project_id) {
        $selected = true;
    }
}

@endphp


@if ($href != null)
    <form action={{ url($href) }} method="{{ $method }}" class="w-full">
        @csrf
        <button class="w-full px-4 py-1 flex items-center gap-2 text-md hover:text-black hover:bg-light-gray rounded-lg transition-all {{ $selected ? "text-black" : "text-dark-gray" }}">
            {{ $slot }}
        </button>
    </form>
@endif