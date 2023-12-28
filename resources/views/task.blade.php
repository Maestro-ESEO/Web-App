<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Maestro</title>
    </head>
    <body>
        <h1>Tasks</h1>
        <p>Il y a au total {{count($tasks)}} tâches</p>
        @foreach($tasks as $task)
        <p>{{$task->name}}</p>
        <p>{{$task->description}}</p>
        <p>{{$task->deadline}}</p>
        <hr>
        @endforeach

    </body>
</html>