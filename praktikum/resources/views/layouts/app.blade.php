<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Portal Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <nav class="bg-blue-600 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">Aplikasi Laravel</h1>
            <span class="text-sm bg-blue-700 px-3 py-1 rounded-full">Praktikum Web</span>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="text-center text-gray-500 text-sm py-8 border-t border-gray-200 mt-12">
        &copy; 2026 Portal Mahasiswa - Laporan Praktikum
    </footer>

</body>
</html>