<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityLogController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('dashboard');

Route::get('/activity-logs', [ActivityLogController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('activity-logs.index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/prescriptions/deleted', [PrescriptionController::class, 'deleted'])
        ->middleware('admin')
        ->name('prescriptions.deleted');

    Route::resource('prescriptions', PrescriptionController::class)
    ->middleware('admin');
});

require __DIR__.'/auth.php';