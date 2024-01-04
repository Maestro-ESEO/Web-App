@extends("auth.layout")

@section("content")

<div class="w-1/2 flex flex-col items-center justify-center gap-6">
    <h2 class="text-5xl font-bold uppercase">
        Connexion
    </h2>

    <form action={{ route("auth.login") }} method="post" class="w-full flex flex-col items-center justify-center gap-4">

        @csrf

        <div class="w-full flex flex-col items-start justify-start gap-2">
            <label for="email" class="flex flex-row items-center justify-start gap-2 font-semibold text-md text-dark-gray">
                <x-icons.email></x-icons.email>
                Email
            </label>
            <input type="email" name="email" value="{{ old("email") }}" class="rounded-xl bg-light-gray py-2 px-4 w-full text-md shadow-input">
            <p class="text-sm text-red font-semibold">
                @error("email")
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div class="w-full flex flex-col items-start justify-start gap-2">
            <label for="password" class="flex flex-row items-center justify-start gap-2 font-semibold text-md text-dark-gray">
                <x-icons.password></x-icons.password>
                Mot de passe
            </label>
            <input type="password" name="password" value="{{ old("password") }}" class="rounded-xl bg-light-gray py-2 px-4 w-full text-md shadow-input">
            <p class="text-sm text-red font-semibold">
                @error("password")
                    {{ $message }}
                @enderror
            </p>
        </div>

        <button class="w-72 p-2 my-6 rounded-full bg-red uppercase text-xl text-white font-semibold shadow-btn">
            Se connecter
        </button>
    </form>

    <div class="w-full flex flex-row items-center justify-stretch gap-2">
        <div class="flex-1 h-0.5 rounded-full bg-dark-gray"></div>
        <p class="text-dark-gray text-md font-bold">OU</p>
        <div class="flex-1 h-0.5 rounded-full bg-dark-gray"></div>
    </div>

    <a href="/register" class="text-dark-gray font-bold text-lg underline">
        Créer un compte
    </a>
</div>

@endsection