<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {

    // Rutas para los álbumes
    Route::get('/album/{id}', [AlbumController::class, 'show']);
    Route::patch('/album/{id}', [AlbumController::class, 'update']);
    Route::delete('/album/{id}', [AlbumController::class, 'destroy']);
    
    // Rutas para artistas
    Route::get('/artist/{id}', [ArtistController::class, 'show']);
    Route::patch('/artist/{id}', [ArtistController::class, 'update']); 
    Route::delete('/artist/{id}', [ArtistController::class, 'destroy']);


    // Ruta para busquedas
    Route::get('/search', [TrackController::class, 'search']);

});


