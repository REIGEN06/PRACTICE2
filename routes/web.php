<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ExcelController;

Route::get('/', [MainController::class,'home'])->name('home');
Route::get('/licences', [MainController::class,'licences'])->name('licences');
Route::get('/fields', [MainController::class,'fields'])->name('fields');

Route::get('/import/subject_and_district', [ExcelController::class,'import_subject_rf']);
Route::get('/import/subsoil_user', [ExcelController::class,'import_subsoil_user']);
Route::get('/import/licence', [ExcelController::class,'import_licence']);
Route::get('/import/field', [ExcelController::class,'import_field']);
// Route::get('/import/licence_area', [ExcelController::class,'import_licence_area']);

//в сабсоил юзер странно добавляется управляющая компания id
//в филд сделать explode по всем строкам








// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
