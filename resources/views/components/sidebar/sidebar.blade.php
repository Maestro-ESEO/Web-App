@php

use App\Http\Controllers\ProjectController;

$jsonData = app(ProjectController::class)->index()->getContent();
$data = json_decode($jsonData, true);
$projects = $data["status"] == 200 ? $data["data"] : null;

@endphp


<section class="fixed w-64 p-4 h-screen flex flex-col items-center justify-between shadow-box">

    <a class="w-full flex items-center justify-center gap-2" href={{ url("/") }}>
        <img src={{ asset("logo.png") }} alt="Logo" class="w-8" draggable="false">
        <h2 class="text-2xl text-blue font-bold">Maestro</h2>
    </a>

    <div class="w-full flex flex-col items-start justify-start gap-6">
        <x-sidebar.category title="Pages">
            <x-sidebar.button href="dashboard">
                <x-icons.dashboard size="18" /> Dashboard
            </x-sidebar.button>
            <x-sidebar.button href="profile">
                <x-icons.name size="18" /> Profile
            </x-sidebar.button>
        </x-sidebar.category>
        
        @if ($projects != null)
            <x-sidebar.category title="Projects">
                @foreach ($projects as $project)
                    <x-sidebar.button href="project/{{ $project['id'] }}">
                        <x-icons.project size="18" /> {{ $project['name'] }}
                    </x-sidebar.button>
                @endforeach
            </x-sidebar.category>
        @endif
    </div>

    <x-sidebar.profile />

</section>