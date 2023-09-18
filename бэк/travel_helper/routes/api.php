<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::group(['middleware' => 'auth:sanctum'], static function () {
    Route::post('logout', [AuthController::class, 'logOut'])->name('api.logout');
});
