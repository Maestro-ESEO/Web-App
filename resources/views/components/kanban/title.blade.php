@props(["color" => "black"])

<div class="py-1 px-4 flex items-center justify-center border border-{{$color}} rounded-xl font-semibold text-{{$color}}">{{$slot}}
</div>