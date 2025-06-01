<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>

    <script src="https://cdn.tailwindcss.com"></script>

    @yield('styles')
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <nav class="bg-white shadow mb-8">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-blue-600">Data Obat</h1>
            <ul class="flex space-x-4">
                <li>
                    <a href="{{ route('medicines.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Obat</a>
                </li>
                <li>
                    <a href="{{ route('medicines.create') }}" class="text-gray-700 hover:text-blue-600 font-medium">Tambah Obat</a>
                </li>
                <li>
                    <a href="{{ route('medicines.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Manajemen Obat</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto px-4">
        @yield('content')
    </main>

</body>
</html>
