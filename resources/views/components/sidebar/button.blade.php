@props([
    'href' => '#',
    'selected' => false
])

<a
    href="{{ $href }}"
    class="w-full px-4 py-1 flex items-center gap-2 text-md hover:text-black hover:bg-light-gray rounded-lg transition-all {{ $selected ? "text-black" : "text-dark-gray" }}"
>
    {{ $slot }}
</a>