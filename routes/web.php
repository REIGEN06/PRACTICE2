<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\DBExportController;

Route::get('/', [MainController::class,'home'])->name('home');
Route::get('/licences', [MainController::class,'licences'])->name('licences');
Route::get('/fields', [MainController::class,'fields'])->name('fields');

Route::get('/import/subject_and_district', [ExcelController::class,'import_subject_rf']);
Route::get('/import/subsoil_user', [ExcelController::class,'import_subsoil_user']);
Route::get('/import/field', [ExcelController::class,'import_field']);
Route::get('/import/licence', [ExcelController::class,'import_licence']);

Route::get('/export/licences_condition', [DBExportController::class,'exportLicenceCondition']);
Route::get('/export/subsoil_users', [DBExportController::class,'exportSubsoilUser']);
Route::get('/search={search}', [DBExportController::class, 'searchUser']);
