<form action={{ route('auth.logout') }} method="post" class="w-full flex justify-start">
    @csrf
    <button class="flex items-center gap-2 text-dark-gray">
        <x-icons.logout /> Logout
    </button>
</form>

<a
    href="{{ $href }}"
    class="w-full px-4 py-1 flex items-center gap-2 text-md hover:text-black hover:bg-light-gray rounded-lg transition-all {{ $selected ? "text-black" : "text-dark-gray" }}"
>
    {{ $slot }}
</a>