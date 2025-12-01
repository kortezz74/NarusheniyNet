<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/reports', function(){
    return view('report.index');
})->name('report.index');

Route::prefix('reports')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/{report}', [ReportController::class, 'show'])->name('reports.show');
    Route::put('/{report}', [ReportController::class, 'update'])->name('reports.update');
    Route::delete('/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
});