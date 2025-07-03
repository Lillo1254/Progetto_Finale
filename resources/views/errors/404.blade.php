<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>erroe 404</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="primary-bg">

    <x-navbar />

    <div class="error-container" data-aos="fade-up" data-aos-duration="1000">
        <h1 class="error-code">404</h1>
        <h2 class="error-message">Ops! Pagina Non Trovata</h2>
        <p class="error-description">
            Sembra che tu abbia intrapreso un'avventura nel vuoto digitale.
            La pagina che stai cercando potrebbe essere stata spostata, eliminata, o forse non è mai esistita.
        </p>
        <a href="{{ url('/') }}" class="btn btn-form px-4 rounded-5">
            Torna alla Homepage
        </a>
    </div>
    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
