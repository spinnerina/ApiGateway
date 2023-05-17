<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GatewayController;


Route::post('/Node', [GatewayController::class, 'sendNode']);
Route::get('/Go', [GatewayController::class, 'getApiGo']);
Route::post('/Python', [GatewayController::class, 'deleteApiPython']);
