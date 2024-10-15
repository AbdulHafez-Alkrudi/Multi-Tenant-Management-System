<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\CheckEmployeeLimit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'company'] , function(){
    Route::post('register', [CompanyController::class, 'register']);
});
Route::group(['prefix' => 'employee'] , function(){
    Route::post('register', [UserController::class, 'register'])->middleware(CheckEmployeeLimit::class);
    Route::post('login', [UserController::class, 'login']);
});
