<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $productos = [
            'CAFÉ POR LIBRA',
            'AZUCAR',
            'BOLSA MANILA GRANDE 12*15 UNIDAD',
            'CAJA DE CARTON',
            'CARTULINA CORRIENTE BLANCA PLIEGO',
            'FOLDER DE GUSANO TAMAÑO OFICIO UNIDAD',
            'PAPEL BLANCO GRANITO RESMA',
            'PAPEL BOND T/CARTA B-20 RESMA',
            'CLIP #1 CAJA',
            'FOLDER PLASTICO DE COLOR T. CARTA UNIDAD',
            'PLUMON GRUESO PERMANENTE DE 90/AZUL UNIDAD',
            'TIRRO DE 3/4 ROLLO',
            'TAMBOR AMARILLO P/XEROX PH6700 108R00973',
            'TINTA C9388A AMARILLO P/IMPRESOR HP L7590',
            'TONER 106R01604 NEG.ALTO R. P/IMP.XEROX 6505',
            'TONER P/MULTIFUNCIONAL HP M5035 Q7570A',
            'BATERIAS CR 2032',
        ];

        foreach ($productos as $nombre) {
            Producto::create(['nombre' => $nombre]);
        }
    }
}
