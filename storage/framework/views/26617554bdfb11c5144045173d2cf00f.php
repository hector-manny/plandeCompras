<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-10 px-4">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow text-center">
        <h1 class="text-2xl font-bold mb-6">📦 Sistema de Planes de Compra</h1>

        <a href="<?php echo e(route('planes.create')); ?>" class="block bg-blue-600 text-white py-2 px-4 rounded mb-3 hover:bg-blue-700">
            ➕ Reportar Plan de Compra
        </a>

        <a href="<?php echo e(route('planes.index')); ?>" class="block bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
            📋 Ver Listado de Planes
        </a>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\plan-compras\resources\views/home.blade.php ENDPATH**/ ?>