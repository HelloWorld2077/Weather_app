<?php

use App\Http\Controllers\currentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', [currentController::class, 'index']);

Route::get('/entry_forecast', [currentController::class, 'entryForForecast']);

Route::get('/about', [currentController::class, 'about']);

Route::post('/location', [currentController::class, 'collectLocation']);

Route::get('/current', [currentController::class, 'gatherInfo']);

Route::get('/forecast', [currentController::class, 'gatherForecastInfo']);
