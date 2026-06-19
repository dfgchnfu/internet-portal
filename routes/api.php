<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);

Route::middleware('apitoken')->group(function () {

    Route::apiResource(
        'companies',
        CompanyController::class
    );

});
