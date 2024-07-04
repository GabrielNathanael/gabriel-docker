<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::get('/showlogin', [UserController::class,'showLoginUser'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class,'register']);
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth:sanctum');
Route::post('/edituser/{user}', [UserController::class,'editUpdate'])->middleware('auth:sanctum');
Route::delete('/delete/{user}', [UserController::class,'deleteUser'])->middleware('auth:sanctum');

Route::get('/getfilms', [FilmController::class, 'index'])->middleware('auth:sanctum');
Route::get('/getfilms/{id}', [FilmController::class, 'show'])->middleware('auth:sanctum');
Route::post('/postfilms', [FilmController::class, 'store'])->middleware('auth:sanctum');
Route::put('/fupdatefilms/{id}', [FilmController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/deletefilms/{id}', [FilmController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/getgenres', [GenreController::class, 'index'])->middleware('auth:sanctum');
Route::get('/getgenres/{id}', [GenreController::class, 'show'])->middleware('auth:sanctum');
Route::post('/postgenres', [GenreController::class, 'store'])->middleware('auth:sanctum');
Route::put('/updategenres/{id}', [GenreController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/deletegenres/{id}', [GenreController::class, 'destroy'])->middleware('auth:sanctum');