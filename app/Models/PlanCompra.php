<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlanCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'año',
        'unidad_organizativa_id',
        'producto_id',
        'precio_unitario',
        'cantidad',
        'costo_total'
    ];

    public function unidadOrganizativa()
    {
        return $this->belongsTo(UnidadOrganizativa::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
