<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KezilabdaController;

Route::get('/', [KezilabdaController::class,'index'])->name('fooldal');
Route::post('/',[KezilabdaController::class,'formCreate']);

Route::get('/csapattagok/{csid}',[KezilabdaController::class,'csapatTagok'])->name('csapattagok');

Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/admin/menu1',[AdminController::class,'lista'])->name('admin.lista');
});