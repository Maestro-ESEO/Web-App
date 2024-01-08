@extends("layout")


@section("page")

<section class="w-64 p-6 h-screen flex flex-col items-center justify-between shadow-box">
    <div class="w-full flex items-center justify-center gap-2">
        <img src="logo.png" alt="Logo" class="w-8">
        <h2 class="text-2xl text-blue font-bold">Maestro</h2>
    </div>

    <form action={{ route('auth.logout') }} method="post" class="w-full flex justify-start">
        @csrf
        <button class="flex items-center gap-2 text-dark-gray">
            <x-icons.logout /> Logout
        </button>
    </form>
</section>

<main class="min-h-full flex flex-1 flex-col items-center justify-center">
    @yield("content")
</main>

@endsection