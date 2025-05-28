<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generate-pdf', [PDFController::class, 'generate']);

Route::get('/surat/form', [PDFController::class, 'form'])->name('surat.form');
Route::post('/surat/generate', [PDFController::class, 'generateFromForm'])->name('surat.generate');
