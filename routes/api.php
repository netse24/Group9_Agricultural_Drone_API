<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
<<<<<<< HEAD

// DRONES

Route::resource('drones', DroneController::class);
=======
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
>>>>>>> 15c52a27ca03a4278d39b10e414631131eb20ae2
