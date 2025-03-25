@extends('layouts.app')

@section('title', 'Nuevo Plan de Compra')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">📝 Reporte de Plan de Compra</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('planes.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            <div>
                <label class="block mb-1 font-semibold">Año:</label>
                <input type="number" name="año" class="w-full border rounded p-2" value="{{ old('año', date('Y') + 1) }}" required>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Unidad Organizativa:</label>
                <select name="unidad_organizativa_id" class="w-full border rounded p-2" required>
                    <option value="">Seleccione</option>
                    @foreach($unidades as $unidad)
                        <option value="{{ $unidad->id }}" {{ old('unidad_organizativa_id') == $unidad->id ? 'selected' : '' }}>
                            {{ $unidad->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block mb-1 font-semibold">Producto:</label>
                <select name="producto_id" class="w-full border rounded p-2" required>
                    <option value="">Seleccione</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                            {{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Precio Unitario:</label>
                <input type="number" name="precio_unitario" step="0.01" class="w-full border rounded p-2" value="{{ old('precio_unitario') }}" required>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Cantidad:</label>
                <input type="number" name="cantidad" class="w-full border rounded p-2" value="{{ old('cantidad') }}" required>
            </div>

            <div class="md:col-span-2 text-right">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endsection
