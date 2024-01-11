@extends("layout")


@section("page")

<x-sidebar.sidebar />

<main class="ml-64 min-h-full flex flex-1 flex-col items-center justify-center">
    @yield("content")
</main>

@endsection