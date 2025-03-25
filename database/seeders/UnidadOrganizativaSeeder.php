<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnidadOrganizativa;

class UnidadOrganizativaSeeder extends Seeder
{
    public function run()
    {
        $unidades = [
            'Direccion de Inteligencia de Políticas Económicas',
            'Dirección de Innovación y Competitividad',
            'Dirección de Política Comercial',
            'Dirección de Planificación y Gestión de Calidad',
        ];

        foreach ($unidades as $nombre) {
            UnidadOrganizativa::create(['nombre' => $nombre]);
        }
    }
}
