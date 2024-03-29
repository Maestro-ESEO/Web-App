@php
    switch ($priority) {
        case 0:
            $color="bg-green-600";
            break;
        case 1:
            $color="bg-amber-600";
            break;
        case 2:
            $color="bg-red";
            break;
        default:
            $color="bg-grey-600";
            break;
    }

    $deadline = strtotime($date);
@endphp

<a href="{{url($href)}}" class="w-full flex flex-row justify-between items-center px-4 py-2 bg-white rounded-xl shadow-project hover:shadow-red transition-all">
    <div class="flex flex-1 flex-col justify-start items-start">
        <p class="font-semibold text-sm line-clamp-1">{{$title}}</p>
        <div class="flex justify-start items-center text-dark-gray gap-1">
            <x-icons.deadline size="16" />
            <p class="text-xs inline-block">{{date('M. d, Y', $deadline)}}</p>
        </div>
    </div>
    @if($status != 3)
    <x-task.priority priority="{{$priority}}" size="4" />
    @else
    <div class="text-green-600">
        <x-icons.checked size="16" stroke="4"/>
    </div>
    @endif
</a>