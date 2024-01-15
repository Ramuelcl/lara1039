<?php
use App\Http\Controllers\Banca\BancaController;

Route::middleware('auth')
    ->name('banca.')
    ->prefix('banca')
    ->group(function () {
        // Route::get('/', [BancaController::class, 'index'])->name('index');
        Route::get('/banca', [BancaController::class, 'showEntidades'])->name('showEntidades');
        Route::get('/movimientos', [BancaController::class, 'show'])->name('show');
        Route::post('/traspasos', [BancaController::class, 'traspaso'])->name('traspaso');
        Route::get('/entidades', [BancaController::class, 'showEntidades'])->name('entidades');
    });
