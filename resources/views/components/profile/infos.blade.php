@php
    
$user = Auth::user();

@endphp

<div class="flex flex-1 flex-col items-center justify-start rounded-2xl shadow-project p-4 min-w-96 bg-gray-100">
    <h3 class="font-bold text-black text-xl mb-4">Your informations</h3>

    <img src="{{ $user->profile_photo_path }}" alt="Photo" class="w-32 rounded-full m-2">

    <p class="text-md font-semibold">{{ $user->first_name." ".$user->last_name }}</p>
    <p class="text-md text-dark-gray">{{ $user->email }}</p>

    <a href="{{ url("/profile/edit") }}">
        <x-profile.button>Edit</x-profile.button>
    </a> 
</div>