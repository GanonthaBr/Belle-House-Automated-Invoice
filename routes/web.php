<?php

use Illuminate\Support\Facades\Auth;
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
Route::post('/dechargestore', [PDFExportController::class, 'dechargestore'])->name('dechargestore'); //add new
Route::get('/createdecharge', [PDFExportController::class, 'createdecharge'])->name('createdecharge');
Route::get('/decharge/{id}', [PDFExportController::class, 'dechargeshow'])->name('dechargeshow'); //dowload
Route::get('/editdecharge/{id}', [PDFExportController::class, 'editdecharge'])->name('editdecharge'); //edit
Route::put('/updatedecharge/{id}', [PDFExportController::class, 'updatedecharge'])->name('updatedecharge'); //update
Route::get('/deletedecharge/{id}', [PDFExportController::class, 'deletedecharge'])->name('deletedecharge'); //remove
Route::get('/dechargepdf/{id}', [PDFExportController::class, 'dechargepdf'])->name('dechargepdf'); //dowload
Route::get('/dechargesinvoices', action: [HomeController::class, 'top_10_invoices'])->name('topten');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
