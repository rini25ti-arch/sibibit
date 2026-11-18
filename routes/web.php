<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VarietasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('varietas', VarietasController::class)->parameters([
    'varietas' => 'varietas'
]);