@extends('layouts.app')

@section('title', 'Listado de Planes de Compra')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Listado de Planes de Compra</h1>

        <form method="GET" class="flex gap-4 mb-6">
            <div>
                <label class="block text-sm">Año:</label>
                <select name="año" class="border rounded p-2">
                    <option value="">Todos</option>
                    @foreach($años as $año)
                        <option value="{{ $año }}" {{ request('año') == $año ? 'selected' : '' }}>{{ $año }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm">Unidad Organizativa:</label>
                <select name="unidad_organizativa_id" class="border rounded p-2">
                    <option value="">Todas</option>
                    @foreach($unidades as $unidad)
                        <option value="{{ $unidad->id }}" {{ request('unidad_organizativa_id') == $unidad->id ? 'selected' : '' }}>
                            {{ $unidad->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Filtrar
                </button>
            </div>
        </form>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2 border">Año</th>
                    <th class="p-2 border">Unidad Organizativa</th>
                    <th class="p-2 border">Producto</th>
                    <th class="p-2 border">Precio Unitario</th>
                    <th class="p-2 border">Cantidad</th>
                    <th class="p-2 border">Costo Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($planes as $plan)
                    <tr>
                        <td class="p-2 border">{{ $plan->año }}</td>
                        <td class="p-2 border">{{ $plan->unidadOrganizativa->nombre }}</td>
                        <td class="p-2 border">{{ $plan->producto->nombre }}</td>
                        <td class="p-2 border">${{ number_format($plan->precio_unitario, 2) }}</td>
                        <td class="p-2 border">{{ $plan->cantidad }}</td>
                        <td class="p-2 border font-semibold">${{ number_format($plan->costo_total, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4">No hay datos para mostrar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
