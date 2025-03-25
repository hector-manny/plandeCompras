<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Planes de Compra')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-blue-600 text-white px-6 py-3 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-lg font-bold">📦 Planes de Compra</a>
            <ul class="flex gap-4 text-sm">
                <li><a href="{{ route('planes.create') }}" class="hover:underline">➕ Nuevo</a></li>
                <li><a href="{{ route('planes.index') }}" class="hover:underline">📋 Listado</a></li>
            </ul>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>

</body>
</html>
