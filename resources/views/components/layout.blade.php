<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $titlePage }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
<style>
    body {
        overflow-x: hidden;
    }
</style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="primary-bg">

    <x-navbar />
    <div class="navbarclass"></div>
    <div id="custom-cursor"></div>
    @if (session('message'))
        <div id="message" class="row justify-content-center px-12">
            <div class="col-12 col-sm-10 col-lg-12 col-xl-10 alert alert-success dark-text mb-4 rounded-0">
                {{ session('message') }}
            </div>
        </div>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger rounded-0 m-0 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{ $slot }}


    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // document.addEventListener('DOMContentLoaded', () => {
        //     const cursor = document.getElementById('custom-cursor');
        //     let mouseX = 0;
        //     let mouseY = 0;
        //     let cursorX = 0;
        //     let cursorY = 0;

        //     document.addEventListener('mousemove', e => {
        //         mouseX = e.clientX;
        //         mouseY = e.clientY;
        //     });

        //     function animateCursor() {
        //         // Insegui il mouse con ritardo (più basso = più lento)
        //         cursorX += (mouseX - cursorX) * 0.1;
        //         cursorY += (mouseY - cursorY) * 0.1;

        //         cursor.style.left = `${cursorX}px`;
        //         cursor.style.top = `${cursorY}px`;

        //         requestAnimationFrame(animateCursor);
        //     }

        //     animateCursor();
        // });

        document.addEventListener('DOMContentLoaded', function() {
            const message = document.querySelector('#message');
            if (message) {
                setTimeout(() => {
                    message.style.transition = 'opacity 2s ease';
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500);
                }, 5000);
            }
        });
    </script>
</body>

</html>
