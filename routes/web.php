<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KezilabdaController;

Route::get('/', [KezilabdaController::class,'index'])->name('fooldal');
Route::post('/',[KezilabdaController::class,'formCreate']);

Route::get('/csapattagok/{csid}',[KezilabdaController::class,'csapatTagok'])->name('csapattagok');
