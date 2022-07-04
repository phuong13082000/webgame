<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;

Route::get('/', [IndexController::class, 'home']);
Route::get('/dich-vu', [IndexController::class, 'dichvu'])->name('dichvu'); //tat ca
Route::get('/dich-vu/{slug}', [IndexController::class, 'dichvucon'])->name('dichvucon'); //con

Route::get('/danh-muc-game/{slug}', [IndexController::class, 'danhmuc_game'])->name('danhmucgame'); //tat ca
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuccon'])->name('danhmuccon'); //con

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

//category
Route::resource('/category', CategoryController::class);

//slider
Route::resource('/slider', SliderController::class);
