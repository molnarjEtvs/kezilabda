<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KezilabdaController;

Route::get('/', [KezilabdaController::class,'index'])->name('fooldal');
