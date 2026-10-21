<?php

use App\Http\Controllers\ComercioController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('comercios.index');
});

Route::get('/comercios', [ComercioController::class, 'index'])
    ->name('comercios.index');

Route::get('/comercios/{comercio}', [ComercioController::class, 'show'])
    ->name('comercios.show');

// Formulario de nueva transacción El POST no lleva {comercio}

Route::get('/comercios/{comercio}/transacciones/nueva',
    [TransaccionController::class, 'create']
)->name('transacciones.create');

Route::post('/transacciones',
    [TransaccionController::class, 'store']
)->name('transacciones.store');

// Editar y eliminar. PUT y DELETE 
Route::get('/transacciones/{transaccion}/editar',
    [TransaccionController::class, 'edit']
)->name('transacciones.edit');

Route::put('/transacciones/{transaccion}',
    [TransaccionController::class, 'update']
)->name('transacciones.update');

Route::delete('/transacciones/{transaccion}',
    [TransaccionController::class, 'destroy']
)->name('transacciones.destroy');

// Cambiar solo el estado
Route::patch('/transacciones/{transaccion}/mover/{estado}',
    [TransaccionController::class, 'moverEstado']
)->name('transacciones.mover');

// Rutas de práctica
Route::get('/practica/formulario-demo', function () {
    return view('practica.formulario_demo');
});

Route::post('/practica/enviar', function () {
    return 'Formulario recibido correctamente.';
});

// Ruta del reto (el mismo Form Request en otro método). Ya probada,
// se deja comentada como pide la guía.
// Route::post('/practica/duplicar',
//     [TransaccionController::class, 'duplicarUltima']
// )->name('practica.duplicar');
