<?php

use App\Http\Controllers\CategoryAllDeleteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('/dash', function () {
    return view('layouts.dashboard');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('home/send/email/{id}/offer',[HomeController::class,'sendEmail'])->name('sendEmail');
Route::post('home/send/all/email',[HomeController::class,'sendAllEmail'])->name('sendAllEmail');

Route::delete('category/delete/all',[CategoryAllDeleteController::class,'deleteMarkAll'])->name('deleteMarkAll');

Route::resource('category', CategoryController::class);

//sub_categories
Route::get('subcategory/index',[SubcategoryController::class,'index'])->name('subcategory.index');
Route::get('subcategory/create',[SubcategoryController::class,'create'])->name('subcategory.create');
Route::post('subcategory/store',[SubcategoryController::class,'store'])->name('subcategory.store');