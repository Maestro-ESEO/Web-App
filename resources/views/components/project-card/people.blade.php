@props([
    'id' => null,
    'nbDisplayed' => 4
])

@php

use App\Models\UserProject;
use App\Models\User;

if ($id != null) {
    $usersProjects = UserProject::where('project_id', $id)->get();
    $userIds = $usersProjects->pluck('user_id')->toArray();
    $users = User::whereIn('id', $userIds)->get();

    $displayedCircles = $users->count();
    $moreCircles = false;

    if ($displayedCircles > $nbDisplayed) {
        $displayedCircles = $nbDisplayed - 1;
        $moreCircles = true;
    }

    $namesArray = [];
    if($moreCircles) {
        $next_users =$users->slice($displayedCircles);
        foreach ($next_users as $user) {
            $namesArray[] = $user['first_name'] . ' ' . $user['last_name'];
        }
        $namesString = '+ ' . implode(', ', $namesArray);
    }
}

@endphp

@if($id != null)
    <div class="flex justify-start items-center pl-3">
        @foreach ($users as $user)
            <x-project-card.circle
                stylecss="object-scale-down -ml-3"
                url="{{$user['profile_photo_path'] ?? asset('profile_placeholder.png')}}"
                name="{{$user['first_name']}} {{$user['last_name']}}"
            />
            @if ($loop->iteration == $displayedCircles)
                @break
            @endif
        @endforeach

        @if($moreCircles) 
            <div class="h-9 w-9 -ml-3 rounded-full flex items-center justify-center bg-gray-300 text-sm relative inline-block group">+{{($users->count())-$displayedCircles}}
                <x-ui.tooltip text="{{$namesString}}"/>
            </div>
        @endif
    </div>
@endif