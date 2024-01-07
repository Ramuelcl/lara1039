<?php
use App\Http\Controllers\Banca\BancaController;

Route::middleware('auth')
    ->name('banca.')
    ->prefix('banca')
    ->group(function () {
        Route::get('/', [BancaController::class, 'index'])->name('banca.index');
        Route::get('/banca', [BancaController::class, 'index'])->name('banca.index');
        Route::get('/banca/movimientos', [BancaController::class, 'show'])->name('banca.show');
        Route::post('/banca/traspasos', [BancaController::class, 'traspaso'])->name('banca.traspaso');
    });
