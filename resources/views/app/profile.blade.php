@extends("app.layout")


@section("content")

@php

use App\Utils\AuthUtil;
    
$user = AuthUtil::getAuthUser();

@endphp

<div class="w-full h-full flex flex-col justify-start py-14 px-16 gap-8">
    <x-ui.title>Your profile</x-ui.title>

    <div class="w-full flex flex-row gap-8 items-stretch justify-stretch flex-wrap">
        <x-profile.infos />
        <x-profile.stats />
    </div>
</div>

@endsection