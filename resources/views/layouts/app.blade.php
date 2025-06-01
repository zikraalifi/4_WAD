<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Konsultasi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
<body>
    <div id="app">
        {{-- Ini adalah tempat konten dari view lain akan disuntikkan --}}
        @yield('content')
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
