<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::middleware("guest:admin")->group(function(){
    Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
});




Route::middleware("auth:admin")->group(function(){

    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
});
