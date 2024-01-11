@props([
    "title" => "Category"
])

<div class="w-full flex flex-col items-start justify-start gap-1">
    <p class="text-dark-gray text-sm font-light mb-1 px-4">
        {{ $title }}
    </p>
    {{ $slot }}
</div>