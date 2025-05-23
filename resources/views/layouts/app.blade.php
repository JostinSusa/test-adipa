<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administración')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('content/themes/adipa/style.css') }}">

</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/persona">Administrador de personas</a>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>


    <!-- Scripts personalizados (opcional) -->
    {{-- <script src="{{ asset('themes/mi-tema/assets/scripts/app.js') }}" defer></script> --}}
</body>
</html>
