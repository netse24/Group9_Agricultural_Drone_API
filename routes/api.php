<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
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

// Farmer 
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // DRONES ROUTE 
    Route::resource('drones', DroneController::class); // get all drones, get a lcoatin of adrone... 
    Route::get('drones/{name}/location', [DroneController::class, 'showDroneLocation']);

    // Maps
    Route::resource('maps', MapController::class);

    // Provinces
    Route::resource('provinces', ProvinceController::class);

    // Farms
    Route::resource('farms', FarmController::class);

    // Locations
    Route::resource('locations', LocationController::class);

    // Provinces
    Route::resource('provinces', ProvinceController::class);

    // Instructions

    Route::resource('instructions', InstructionController::class);
});

Route::resource('plans', PlanController::class);
// Route::get('maps/{province}/{id}', [MapController::class, 'show']);
Route::delete('maps/{province}/{id}', [MapController::class, 'destroy']);

// Users
Route::resource('users', UserController::class);
