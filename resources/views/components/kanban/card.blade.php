@php
    switch ($priority) {
        case 0:
            $color="bg-green-600";
            break;
        case 1:
            $color="bg-orange-600";
            break;
        case 2:
            $color="bg-red";
            break;
        default:
            $color="bg-grey-600";
            break;
    }
@endphp

<div class="w-full flex flex-row justify-between items-center px-4 py-2 bg-white rounded-xl">
    <div class="flex flex-col justify-start items-start">
        <p class="font-semibold text-sm line-clamp-1">{{$title}}</p>
        <div class="flex justify-start items-center text-dark-gray gap-1">
            <x-icons.deadline size="16" />
            <p class="text-xs inline-block">{{$date}}</p>
        </div>
    </div>
    <div class="h-4 w-4 rounded-full {{$color}}"></div>
</div>