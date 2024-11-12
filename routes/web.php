<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Perfil del usuario
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Rutas de reservas para clientes
    Route::prefix('reservations')->name('reservations.')->group(function () {
        Route::get('create', [ReservationController::class, 'create'])->name('create');
        Route::post('store', [ReservationController::class, 'store'])->name('store');
        Route::get('my', [ReservationController::class, 'myReservations'])->name('myReservations');
    });
});

// Rutas de administración de habitaciones para usuarios con el permiso 'manage.rooms'
Route::middleware(['auth', 'can:manage.rooms'])->group(function () {
    Route::resource('rooms', RoomController::class);
});

// Rutas de administración de reservas para usuarios con el permiso 'admin.reservations'
Route::middleware(['auth', 'can:admin.reservations'])->prefix('reservations')->name('reservations.')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])->name('index');
    Route::post('{reservation}/status/{status}', [ReservationController::class, 'updateStatus'])->name('updateStatus');
});


require __DIR__.'/auth.php';
