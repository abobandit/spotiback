<?php

use App\Http\Controllers\AuthorController as AuthorController;
use App\Http\Controllers\TrackController as TrackController;
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

Route::apiResource('/authors', AuthorController::class);
Route::prefix('/admin')->group(function (){
	Route::apiResource('/tracks', TrackController::class);;
});