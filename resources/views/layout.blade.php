<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maestro</title>

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

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
                        "blue": "#010e35",
                        "dark-gray": "#838383",
                        "light-gray": "#D9D9D9",
                        "white": "#FFFFFF",
                        "black": "#000000"
                    },
                    boxShadow: {
                        "box": "0 0 40px #838383",
                        "btn": "0 4px 4px rgba(131, 131, 131, 0.5)",
                        "input": "inset 0 4px 4px rgba(131, 131, 131, 0.5)",
                        "project" : "0 0 10px rgba(0,0,0,0.5)"
                    },
                    fontFamily: {
                        "sans": ["Poppins", "sans-serif"]
                    }
                }
            }
        }
    </script>
</head>

<body class="w-screen h-screen flex flex-row items-stretch justify-stretch overflow-x-hidden">
    @yield("page")
</body>

</html>