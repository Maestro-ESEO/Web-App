@extends("auth.layout")


@section("content")

<x-ui.title>Login to Maestro</x-ui.title>

<form action={{ route("auth.login") }} method="post" class="w-full flex flex-col items-center justify-center gap-4">
    @csrf

    <x-ui.input type="email" name="email">
        <x-icons.email /> Email
    </x-ui.input>

    <x-ui.input type="password" name="password">
        <x-icons.password /> Password
    </x-ui.input>

    <x-ui.button>Log in</x-ui.button>
</form>

<x-ui.text-separator>OR</x-ui.text-separator>

<x-ui.link-button href="/register">Create an account</x-ui.link-button>

@endsection