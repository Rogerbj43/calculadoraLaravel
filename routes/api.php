<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sumController;
use App\Http\Controllers\restaController;
use App\Http\Controllers\divController;
use App\Http\Controllers\multController;
use App\Http\Controllers\expController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['validate.numbers', 'set.locale'])->group(function () {
    Route::get('/sum/{n1}/{n2}', [sumController::class, 'hi']);
    Route::get('/rest/{n1}/{n2}', [restaController::class, 'hi']);
    Route::get('/div/{n1}/{n2}', [divController::class, 'hi']);
    Route::get('/mult/{n1}/{n2}', [multController::class, 'hi']);
    Route::get('/exp/{n1}/{n2}', [expController::class, 'hi']);
});