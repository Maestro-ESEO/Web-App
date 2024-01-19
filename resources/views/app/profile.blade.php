@extends("app.layout")


@section("content")

@php

use App\Utils\AuthUtil;
    
$user = AuthUtil::getAuthUser();

@endphp

<div class="w-full h-full flex flex-col justify-start py-14 px-16">
    <x-ui.title>Your profile</x-ui.title>

    
</div>

@endsection