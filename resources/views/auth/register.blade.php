<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
    theme: {
        extend: {
            colors: {
                clifford: '#da373d',
            }
        }
    }
    }
    </script>
</head>

<body class="">
    <div class="w-full h-full flex items-center justify-center">
        <div class="">
            <a href="/login">Login</a>

            <form action={{ route('auth.register') }} method="post">

                @csrf

                <div>
                    <label for="first_name">Prénom</label>
                    <input type="first_name" name="first_name" placeholder="Prénom" value="{{ old('first_name') }}">
                    @error('first_name')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <label for="last_name">Nom</label>
                    <input type="last_name" name="last_name" placeholder="Nom" value="{{ old('last_name') }}">
                    @error('last_name')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="Mot de passe">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

                <button class="p-2 rounded-lg bg-clifford">Register</button>
            </form>
        </div>
    </div>
</body>

</html>

