@extends("layout")


@section("page")

<section class="w-64 h-full flex items-center justify-center shadow-box">
    <form action={{ route('auth.logout') }} method="post">
        @csrf
        <button>Logout</button>
    </form>
</section>

<main class="h-full flex flex-1 flex-col items-center justify-center">
    @yield("content")
</main>

@endsection