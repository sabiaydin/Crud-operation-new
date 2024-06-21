<?php

use App\Http\Controllers\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/user',[UserApiController::class,'index'])->name('user.index');
// Route::post('/user',[UserApiController::class,'store'])->name('user.store');
// Route::get('/user/{id}',[UserApiController::class,'show'])->name('user.show');
// Route::put('/user/{id}',[UserApiController::class,'update'])->name('user.update');
// Route::delete('/user/{id}',[UserApiController::class,'destroy'])->name('user.destroy');


Route::apiResource('users', UserApiController::class);
