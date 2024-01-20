@extends("app.layout")


@section("content")

@php

use App\Utils\AuthUtil;
    
$user = AuthUtil::getAuthUser();

@endphp

<div class="w-full h-full flex flex-col justify-start py-14 px-16 gap-8">
    <x-ui.title>Edit your profile</x-ui.title>

    <form action={{ route('profile.update') }} method="post" class="w-[48rem] flex flex-col items-center justify-center gap-4">
        @csrf

        <div class="w-full flex flex-row items-center gap-8">
            <x-ui.input type="first_name" name="first_name" value="{{ $user->first_name }}">
                <x-icons.name /> First name
            </x-ui.input>

            <x-ui.input type="last_name" name="last_name" value="{{ $user->last_name }}">
                <x-icons.name /> Last name
            </x-ui.input>
        </div>

        <x-ui.input type="email" name="email" value="{{ $user->email }}">
            <x-icons.email /> Email
        </x-ui.input>

        <x-ui.input type="password" name="password" value="{{ $user->password }}">
            <x-icons.password /> Password
        </x-ui.input>

        <x-ui.input type="password" name="password_confirm" value="{{ $user->password }}">
            <x-icons.confirm /> Pasword confirmation
        </x-ui.input>

        <x-ui.input type="url" name="image_url" value="{{ $user->profile_photo_path }}">
            <x-icons.name /> Photo URL
        </x-ui.input>

        <x-ui.button>Update</x-ui.button>
    </form>

</div>

@endsection