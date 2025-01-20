<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\InmuebleApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(InmuebleApiController::class)->group(function (){
    Route::get('/inmuebles','index');
    Route::get('/inmuebles/{inmueble}','show');
    Route::post('/inmuebles','store');
    Route::put('/inmuebles/{inmueble}','update');
    Route::delete('/inmuebles/{inmueble}','destroy');
});
