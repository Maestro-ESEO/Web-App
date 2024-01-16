@php

$tasks_text = $tasksUnfinished . " task" . ($tasksUnfinished > 1 ? "s" : "") . " left";
if ($percent == -1) {
    $tasks_text = "No tasks yet";
}
if ($percent == 100) {
    $tasks_text = "All tasks done";
}

@endphp


<div class="flex flex-col flex-1 justify-center items-start">
    <p class="text-sm text-dark-gray italic">{{ $tasks_text }}</p>
    <x-project-card.progress percent="{{ $percent }}" />
</div>