@extends("auth.layout")


@section("content")

<x-ui.title>Connexion</x-ui.title>

<form action={{ route("auth.login") }} method="post" class="w-full flex flex-col items-center justify-center gap-4">
    @csrf

    <x-ui.input type="email" name="email">
        <x-icons.email /> Email
    </x-ui.input>

    <x-ui.input type="password" name="password">
        <x-icons.password /> Mot de passe
    </x-ui.input>

    <x-ui.button>Se connecter</x-ui.button>
</form>

<x-ui.text-separator>OU</x-ui.text-separator>

<x-ui.link-button href="/register">Créer un compte</x-ui.link-button>

@endsection