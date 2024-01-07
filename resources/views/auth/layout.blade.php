<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maestro</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "red": "#F7422B",
                        "dark-gray": "#838383",
                        "light-gray": "#D9D9D9",
                        "white": "#FFFFFF",
                        "black": "#000000"
                    },
                    boxShadow: {
                        "box": "0 0 60px #838383",
                        "btn": "0 4px 4px rgba(131, 131, 131, 0.5)",
                        "input": "inset 0 4px 4px rgba(131, 131, 131, 0.5)"
                    },
                    fontFamily: {
                        "sans": ["Poppins", "sans-serif"]
                    }
                }
            }
        }
    </script>
</head>

<body class="w-screen h-screen flex flex-row items-stretch justify-stretch">

    <section class="w-1/3 h-full flex items-center justify-center shadow-box">
        <img draggable="false" src="logo.png" alt="Logo" class="w-1/2">
    </section>

    <main class="h-full flex flex-1 flex-col items-center justify-center">
        <div class="w-1/2 flex flex-col items-center justify-center gap-6">
            @yield("content")
        </div>
    </main>

</body>

</html>