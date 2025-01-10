<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function(){
    return "Sobre nosotros";
});

Route::get('/contacto/{EmailContacto}',function ($email){
    return "Me ha llegado el parametro email:$email";
});

Route::get('/users',[UserController::class,'index']);
Route::get('/users/{user}',[UserController::class,'show']);

Route::get('/inmuebles',[\App\Http\Controllers\InmuebleController::class,'index']);
Route::get('/inmuebles/create',[\App\Http\Controllers\InmuebleController::class,'create']);
Route::post('/inmuebles',[\App\Http\Controllers\InmuebleController::class,'store']);
Route::get('/inmuebles/{inmueble}',[\App\Http\Controllers\InmuebleController::class,'show']);
Route::get('/inmuebles/{inmueble}/edit',[\App\Http\Controllers\InmuebleController::class,'edit']);
Route::put('/inmuebles/{inmueble}',[\App\Http\Controllers\InmuebleController::class,'update']);
Route::delete('/inmuebles/{inmueble}',[\App\Http\Controllers\InmuebleController::class,'destroy']);

















