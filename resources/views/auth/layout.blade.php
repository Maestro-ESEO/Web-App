@extends("layout")


@section("page")

<section class="w-1/3 h-full flex items-center justify-center shadow-box">
    <img draggable="false" src="logo.png" alt="Logo" class="w-1/2">
</section>

<main class="h-full flex flex-1 flex-col items-center justify-center">
    <div class="w-1/2 flex flex-col items-center justify-center gap-6">
        @yield("content")
    </div>
</main>

@endsection