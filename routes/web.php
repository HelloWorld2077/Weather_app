<?php

use App\Http\Controllers\currentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', [currentController::class, 'index']);

Route::post('/location', [currentController::class, 'collectLocation']);

Route::get('/current', [currentController::class, 'gatherInfo']);
