<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanCompraController;

Route::get('/planes-compra', [PlanCompraController::class, 'create'])->name('planes.create');
Route::post('/planes-compra', [PlanCompraController::class, 'store'])->name('planes.store');
Route::get('/planes-compra/listado', [PlanCompraController::class, 'index'])->name('planes.index');
Route::get('/', function () {
    return view('home');
});

