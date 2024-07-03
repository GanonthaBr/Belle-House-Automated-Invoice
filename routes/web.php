<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFExportController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/export', [PDFExportController::class, 'export'])->name('export');
Route::get('/create', [PDFExportController::class, 'create'])->name('create');
Route::post('/store', [PDFExportController::class, 'store'])->name('store');
