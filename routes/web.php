<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', HomeController::class)->name('home');


Route::middleware('demo')->group(fn() => [
    Route::post('/reservation', ReservationController::class)->name('reservation.reserve'),
    Route::post('/contact', ContactController::class)->name('contact.send'),

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
        Route::resource('sliders', SliderController::class)->except(['show']);
        Route::resource('categories', CategoryController::class);
        Route::resource('items', ItemController::class);
        Route::get('reservations', [AdminReservationController::class, 'index'])->name('reservation.index');
        Route::post('reservation/{id}', [AdminReservationController::class, 'status'])->name('reservation.status');
        Route::post('reject-reservation/{id}', [AdminReservationController::class, 'inverseStatus'])->name('reservation.inverseStatus');
        Route::delete('reservation/{id}', [AdminReservationController::class, 'destroy'])->name('reservation.destroy');

        Route::get('contact', [AdminContactController::class, 'index'])->name('contact.index');
        Route::get('contact/{id}', [AdminContactController::class, 'show'])->name('contact.show');
        Route::delete('contact/{id}', [AdminContactController::class, 'destroy'])->name('contact.destroy');
    })
]);

