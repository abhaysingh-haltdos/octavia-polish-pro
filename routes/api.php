<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('/submit-lead', [ContactController::class, 'submit']);
Route::get('/get-content', [ContentApiController::class, 'getContent']);
