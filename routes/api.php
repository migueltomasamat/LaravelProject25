<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\InmuebleApiController;
use App\Http\Controllers\API\UserApiController;
use App\Http\Controllers\API\RegisterUserApiController;
use App\Http\Controllers\API\LoginUserApiController;
use App\Http\Middleware\PonerCapulloDeApellidoATodosLosUsers;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::controller(InmuebleApiController::class)->group(function (){
    Route::get('/inmuebles','index');
    Route::get('/inmuebles/{inmueble}','show');
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/inmuebles','store');
        Route::put('/inmuebles/{inmueble}','update');
        Route::delete('/inmuebles/{inmueble}','destroy');
    });

});
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('users',UserApiController::class);
});
Route::get('/users/{user}/ofertas',[UserApiController::class,'ofertas']);
Route::post('/users/{user}/ofertas/{inmueble}',[UserApiController::class,'attach_oferta']);
Route::post('/users/{user}/ofertas',[UserApiController::class,'deattach_oferta']);
Route::put('/users/{user}/ofertas/{inmueble}',[UserApiController::class,'modify_oferta']);

//Route::get('/users/{user}/ofertas/{oferta}',[UserApiController::class,'ofertas']);

Route::post('/register',[RegisterUserApiController::class,'register']);
Route::post('/login',[LoginUserApiController::class,'login'])->name('login');
Route::post('/logout',[LoginUserApiController::class,'logout'])->middleware('auth:sanctum');

Route::delete('/inmuebles',[InmuebleApiController::class,'destroyAll'])->middleware('auth:sanctum');

Route::post('/users',[UserApiController::class,'store'])->middleware([PonerCapulloDeApellidoATodosLosUsers::class]);




