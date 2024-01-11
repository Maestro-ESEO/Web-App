@php

use App\Http\Controllers\ProjectController;

$projectController = new ProjectController();
$data = json_decode($projectController->index()->getContent(), true);
$projects = $data['status'] == 200 ? $data['data'] : null;

@endphp


<section class="fixed w-64 px-4 py-8 h-screen flex flex-col items-center justify-between shadow-box">

    <div class="w-full flex items-center justify-center gap-2">
        <img src="logo.png" alt="Logo" class="w-8">
        <h2 class="text-2xl text-blue font-bold">Maestro</h2>
    </div>

    <div class="w-full flex flex-col items-start justify-start gap-4">
        <x-sidebar.category title="Pages">
            <x-sidebar.button href="/dashboard" selected>
                <x-icons.dashboard size="18" /> Dashboard
            </x-sidebar.button>
        </x-sidebar.category>
        
        <x-sidebar.category title="Projets">
            @if ($projects != null)
                @foreach ($projects as $project)
                    <x-sidebar.button href="/projects/{{ $project['id'] }}">
                        <x-icons.project size="18" /> {{ $project['name'] }}
                    </x-sidebar.button>
                @endforeach
            @endif
        </x-sidebar.category>
    </div>

    <form action={{ route('auth.logout') }} method="post" class="w-full flex justify-start">
        @csrf
        <button class="flex items-center gap-2 text-dark-gray">
            <x-icons.logout /> Logout
        </button>
    </form>

</section>