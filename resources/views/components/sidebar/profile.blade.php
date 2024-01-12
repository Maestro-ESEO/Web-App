@php

$user = Auth::user();
$name = $user->first_name . ' ' . $user->last_name;
$image_url = $user->profile_photo_url ?? asset("profile_placeholder.png");

@endphp


<div class="relative inline-block group w-full">
    <div class="hidden absolute z-10 group-hover:flex bg-white rounded-xl p-2 left-1/2 -translate-x-1/2 bottom-[3rem] w-5/6 flex flex-col items-start justify-start gap-1 cursor-pointer shadow-box">
        <x-sidebar.button href="profile">
            <x-icons.name size="18" /> Profile
        </x-sidebar.button>
        <x-sidebar.button href="logout" method="post">
            <x-icons.logout size="18" /> Logout
        </x-sidebar.button>
    </div>

    <div class="px-4 py-2 w-full flex flex-row items-center justify-start gap-2 group-hover:bg-light-gray hover:bg-light-gray transition-all group cursor-pointer rounded-lg">
        <div class="h-9 w-9 rounded-full">
            <img draggable="false" src="{{$image_url}}" class="w-full h-full object-cover rounded-full" alt="Image">
        </div>

        <p class="text-dark-gray group-hover:text-black transition-all">
            {{ $name }}
        </p>
    </div>
</div>