<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ShortlinkController;
use App\Http\Controllers\PagesController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Route for the dashboard
    Route::get('/dashboard', [PagesController::class, 'renderDashboard'])->name('dashboard');

    // Route for Documentation
    Route::get('/documentation', [PagesController::class, 'renderDocumentation'])->name('documentation');

    // Routes grouped under /shortlinks for all the Shortlink CRUD operations
    Route::group(['prefix' => 'shortlinks'], function () {
        Route::get('/', [ShortlinkController::class, 'index'])->name('shortlinks.index');
        Route::post('/store', [ShortlinkController::class, 'store'])->name('shortlinks.store');
        Route::put('/{shortlink}/update', [ShortlinkController::class, 'update'])->name('shortlinks.update');
        Route::delete('/{shortlink}/destroy', [ShortlinkController::class, 'destroy'])->name('shortlinks.destroy');
    });
});

Route::get('/l/{shortlink}', [ShortlinkController::class, 'redirectShortlink'])->name('shortlinks.redirect');
