@extends("app.layout")


@section("content")

@php

use App\Http\Controllers\ProjectController;

$projects = app(ProjectController::class)->index();

@endphp


<div class="w-full h-full flex flex-col justify-start py-14 px-16">
    <x-ui.title>Hi {{Auth::user()->first_name}}!</x-ui.title>

    <div class="w-full flex flex-wrap justify-start items-start py-16 gap-10">
        @if ($projects != null)
            @foreach ($projects as $project)
                <x-project-card.project-card
                    name="{{$project['name']}}"
                    description="{{$project['description']}}"
                    deadline="{{$project['end_date']}}"
                    id="{{$project['id']}}"
                    href="project/{{$project['id']}}"
                >
                </x-project-card.project-card>
            @endforeach
        @endif
    </div>

</div>

<x-ui.tooltip />

@endsection