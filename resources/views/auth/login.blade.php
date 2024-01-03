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
            <a href="/register">Register</a>

            <form action={{ route('auth.login') }} method="post">

                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="Mot de passe">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

                <button class="p-2 rounded-lg bg-clifford">Login</button>
            </form>
        </div>
    </div>
</body>

</html>

