<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KezilabdaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/egyCsapat/{id}',[KezilabdaController::class,'getCsapat']);

Route::post('/csapatLetrehozas',[KezilabdaController::class,'createCsapat']);