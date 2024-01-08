@extends("auth.layout")


@section("content")

<x-ui.title>Create your account</x-ui.title>

<form action={{ route('auth.register') }} method="post" class="w-full flex flex-col items-center justify-center gap-4">
    @csrf

    <div class="w-full flex flex-row items-center gap-8">
        <x-ui.input type="first_name" name="first_name">
            <x-icons.name /> First name
        </x-ui.input>

        <x-ui.input type="last_name" name="last_name">
            <x-icons.name /> Last name
        </x-ui.input>
    </div>

    <x-ui.input type="email" name="email">
        <x-icons.email /> Email
    </x-ui.input>

    <x-ui.input type="password" name="password">
        <x-icons.password /> Password
    </x-ui.input>

    <x-ui.input type="password" name="password_confirm">
        <x-icons.confirm /> Pasword confirmation
    </x-ui.input>

    <x-ui.button>Sign Up</x-ui.button>
</form>

<x-ui.text-separator>OR</x-ui.text-separator>

<x-ui.link-button href="/login">Sign In</x-ui.link-button>

@endsection