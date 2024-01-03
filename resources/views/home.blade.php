<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Maestro</title>
    </head>
    <body>
        <h1>Profile</h1>
        <p>Hi, {{ $user->first_name . ' ' . $user->last_name }}</p>
        <p>Your email is: {{ $user->email }}</p>
        <form action={{ route('auth.logout') }} method="post">
            @csrf
            <button>Logout</button>
        </form>
    </body>
</html>