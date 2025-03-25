<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadOrganizativa extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function planesDeCompra()
    {
        return $this->hasMany(PlanCompra::class);
    }
}

