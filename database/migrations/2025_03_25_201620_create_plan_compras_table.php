<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_compras', function (Blueprint $table) {
            $table->id();
            $table->year('año');
            $table->foreignId('unidad_organizativa_id')->constrained()->onDelete('cascade');
            $table->foreignId('producto_id')->constrained()->onDelete('cascade');
            $table->decimal('precio_unitario', 10, 2);
            $table->integer('cantidad');
            $table->decimal('costo_total', 12, 2);
            $table->timestamps();
    
            $table->unique(['año', 'unidad_organizativa_id', 'producto_id'], 'plan_unico_por_unidad_producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_compras');
    }
};
