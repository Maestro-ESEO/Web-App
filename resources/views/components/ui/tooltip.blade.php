@props([
    'text' => null
])

@if($text != null)
<div class="hidden absolute z-10 group-hover:flex bg-white rounded-xl p-2 left-1/2 -translate-x-1/2 bottom-[2.5rem] w-fit-content flex flex-col items-center justify-center gap-1 cursor-pointer shadow-box inline-block whitespace-nowrap">
        <p>{{$text}}</p>
</div>
@endif