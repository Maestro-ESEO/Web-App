<div class="w-full flex items-center justify-center gap-2">
    <img src="logo.png" alt="Logo" class="w-8">
    <h2 class="text-2xl text-blue font-bold">Maestro</h2>
</div>

<form action={{ route('auth.logout') }} method="post">
    @csrf
    <button class="flex items-center gap-2 text-dark-gray">
        <x-icons.logout /> Logout
    </button>
</form>