<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFExportController;

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/export/{id}', [PDFExportController::class, 'export'])->name('export'); //dowload
Route::get('/create', [PDFExportController::class, 'create'])->name('create'); //show form
Route::post('/store', [PDFExportController::class, 'store'])->name('store'); //add new
Route::get('/invoice/{id}', [PDFExportController::class, 'show'])->name('show'); //display
Route::get('/edit/{id}', [PDFExportController::class, 'edit'])->name('edit'); //edit
Route::put('/update/{id}', [PDFExportController::class, 'update'])->name('update'); //update

//remove
Route::get('/delete/{id}', [PDFExportController::class, 'delete'])->name('delete');

// Decharge
Route::get('/decharge', [PDFExportController::class, 'decharge'])->name('decharge');
