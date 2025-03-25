<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\UnidadOrganizativa;
use App\Models\PlanCompra;

class PlanCompraController extends Controller
{
    public function create()
    {
        $productos = Producto::where('activo', true)->get();
        $unidades = UnidadOrganizativa::all(); // en versión real se tomaría desde el usuario logueado
        return view('planes.create', compact('productos', 'unidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'año' => 'required|digits:4|integer|min:2024',
            'unidad_organizativa_id' => 'required|exists:unidad_organizativas,id',
            'producto_id' => 'required|exists:productos,id',
            'precio_unitario' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Validar duplicado
        $exists = PlanCompra::where('año', $request->año)
            ->where('unidad_organizativa_id', $request->unidad_organizativa_id)
            ->where('producto_id', $request->producto_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['producto_id' => 'Este producto ya fue registrado para esta unidad y año.'])->withInput();
        }

        $total = $request->precio_unitario * $request->cantidad;

        PlanCompra::create([
            'año' => $request->año,
            'unidad_organizativa_id' => $request->unidad_organizativa_id,
            'producto_id' => $request->producto_id,
            'precio_unitario' => $request->precio_unitario,
            'cantidad' => $request->cantidad,
            'costo_total' => $total,
        ]);

        return redirect()->route('planes.create')->with('success', 'Plan de compra registrado exitosamente.');
    }

    public function index(Request $request)
{
    $años = PlanCompra::select('año')->distinct()->orderByDesc('año')->pluck('año');
    $unidades = UnidadOrganizativa::all();

    $query = PlanCompra::with('producto', 'unidadOrganizativa');

    if ($request->filled('año')) {
        $query->where('año', $request->año);
    }

    if ($request->filled('unidad_organizativa_id')) {
        $query->where('unidad_organizativa_id', $request->unidad_organizativa_id);
    }

    $planes = $query->orderBy('año', 'desc')->get();

    return view('planes.index', compact('planes', 'años', 'unidades'));
}

}
