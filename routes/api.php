<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\InmuebleApiController;
use App\Http\Controllers\API\UserApiController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::controller(InmuebleApiController::class)->group(function (){
    Route::get('/inmuebles','index');
    Route::get('/inmuebles/{inmueble}','show');
    Route::post('/inmuebles','store');
    Route::put('/inmuebles/{inmueble}','update');
    Route::delete('/inmuebles/{inmueble}','destroy');
});

Route::apiResource('users',UserApiController::class);
Route::get('/users/{user}/ofertas',[UserApiController::class,'ofertas']);
//Route::get('/users/{user}/ofertas/{oferta}',[UserApiController::class,'ofertas']);









