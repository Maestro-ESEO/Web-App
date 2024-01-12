<div class="h-9 w-9 rounded-full {{$stylecss}}">
    @if (isset($url))
        <img draggable="false" src="{{$url}}" class="w-full h-full object-cover rounded-full" alt="Image">
    @endif
</div>