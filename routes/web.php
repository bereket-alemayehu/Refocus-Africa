<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExcelExportController;



Route::redirect('/', '/admin');
Route::get('/export/users', [ExcelExportController::class, 'exportUsers'])->name('export.users');