<?php

use App\Http\Controllers\API\PodcastController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout']);
Route::resource('podcasts', PodcastController::class);
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::resource('podcasts', PodcastController::class);
});
Route::resource('users', UserController::class);

