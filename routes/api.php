<?php

use App\Http\Controllers\AuthorsController as AuthorsController;
use App\Http\Controllers\TracksController as TracksController;
use App\Http\Controllers\UserController as UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('/users', UserController::class);
Route::apiResource('/tracks', TracksController::class);
//Route::apiResource('/authors', AuthorsController::class);
