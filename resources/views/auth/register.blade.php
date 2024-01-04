@extends("auth.layout")

@section("content")
<div class="w-1/2 flex flex-col items-center justify-center gap-6">

    <h2 class="text-5xl font-bold uppercase">Inscription</h2>

    <form action={{ route('auth.register') }} method="post"
        class="w-full flex flex-col items-center justify-center gap-4">

        @csrf

        <div class="w-full flex flex-row items-center gap-8">
            <div class="w-full flex flex-1 flex-col items-start justify-center gap-2">
                <label class="flex flex-row items-center justify-start gap-2 font-semibold text-md text-dark-gray"
                    for="first_name">
                    <x-icons.name></x-icons.name>
                    Prénom
                </label>
                <input type="first_name" name="first_name" value="{{ old('first_name') }}"
                    class="rounded-xl bg-light-gray py-2 px-4 w-full text-md shadow-inp">
                <p class="text-sm text-red font-semibold -mt-2">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="w-full flex flex-1 flex-col items-start justify-center gap-2">
                <label class="flex flex-row items-center justify-start gap-2 font-semibold text-md text-dark-gray"
                    for="last_name">
                    <x-icons.name></x-icons.name>
                    Nom
                </label>
                <input type="last_name" name="last_name" value="{{ old('last_name') }}"
                    class="rounded-xl bg-light-gray py-2 px-4 w-full text-md shadow-inp">
                <p class="text-sm text-red font-semibold -mt-2">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
        </div>


        <div class="w-full flex flex-col items-start justify-center gap-2">
            <label class="flex flex-row items-center justify-start gap-2 font-semibold text-md text-dark-gray"
                for="first_name">
                <x-icons.email></x-icons.email>
                Email
            </label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="rounded-xl bg-light-gray py-2 px-4 w-full text-md shadow-inp">
            <p class="text-sm text-red font-semibold -mt-2">
                @error('email')
                {{ $message }}
                @enderror
            </p>
        </div>

        <div class="w-full flex flex-col items-start justify-center gap-2">
            <label class="flex flex-row items-center justify-start gap-2 font-semibold text-md text-dark-gray"
                for="password">
                <x-icons.password></x-icons.password>
                Mot de passe
            </label>
            <input type="password" name="password" value="{{ old('password') }}"
                class="rounded-xl bg-light-gray py-2 px-4 w-full text-md shadow-inp">
            <p class="text-sm text-red font-semibold -mt-2">
                @error('password')
                {{ $message }}
                @enderror
            </p>
        </div>

        <div class="w-full flex flex-col items-start justify-center gap-2">
            <label class="flex flex-row items-center justify-start gap-2 font-semibold text-md text-dark-gray"
                for="password_confirm">
                <x-icons.confirm></x-icons.confirm>
                Confirmer le mot de passe
            </label>
            <input type="password" name="password_confirm" value="{{ old('password_confirm') }}"
                class="rounded-xl bg-light-gray py-2 px-4 w-full text-md shadow-inp">
            <p class="text-sm text-red font-semibold -mt-2">
                @error('password_confirm')
                {{ $message }}
                @enderror
            </p>
        </div>

        <button class=" w-72 p-2 my-6 rounded-full bg-red uppercase text-xl text-white font-semibold shadow-btn">Créer un compte</button>
    </form>

    <div class="w-full flex flex-row items-center justify-stretch gap-2">
        <div class="flex-1 h-0.5 rounded-full bg-dark-gray"></div>
        <p class="text-dark-gray text-md font-bold">OU</p>
        <div class="flex-1 h-0.5 rounded-full bg-dark-gray"></div>
    </div>

    <a href="/login" class="text-dark-gray font-bold text-lg underline">
        Se connecter
    </a>

</div>
@endsection