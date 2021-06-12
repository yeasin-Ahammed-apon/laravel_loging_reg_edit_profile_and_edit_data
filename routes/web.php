<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\datas;
use App\Http\Controllers\login;

//public page
Route::get('/',[datas::class, 'home']);
Route::get('/view_public/{id}',[datas::class, 'view_public']);
//user assces pages
Route::middleware(['loggedout'])->group(function () {
    Route::get('/list',[datas::class, 'list']);
    Route::get('/view/{id}',[datas::class, 'view_page']);
    Route::get('/add_page',[datas::class, 'add_page']);
    Route::post('/add',[datas::class, 'add']);
    Route::get('/edit_page/{id}',[datas::class, 'edit_page']);
    Route::post('/update',[datas::class, 'update']);
    Route::get('/delete/{id}',[datas::class, 'delete']);
});
// login page
Route::middleware(['loggedin'])->group(function () {
    Route::get('/login_page',[login::class, 'login_page']);
    Route::post('/login',[login::class, 'login']);
    Route::get('/registration_page',[login::class, 'registration_page']);
    Route::post('/registration',[login::class, 'registration']);
});
Route::get('/logout',[login::class, 'logout']);


