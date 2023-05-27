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

// User 
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::resource('users', UserController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    // User logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // DRONES ROUTE 

    // get all drones, get a lcoatin of adrone... 
    Route::resource('drones', DroneController::class);
    // Show drone location
    Route::get('/drones/{name}/location', [DroneController::class, 'showDroneLocation']);
    // Get instructions of drone by id
    Route::get('/getInstructions/{id}', [DroneController::class, 'showInstructions']);

    // MAPS
    Route::resource('maps', MapController::class);
    // download map image
    Route::get('/maps/{province}/{id}', [MapController::class, 'download']);
    //delete map image
    Route::delete('/maps/{province}/{id}', [MapController::class, 'destroyImage']);
    //post map image
    Route::post('/maps/{province}/{id}', [MapController::class, 'addDroneImage']);

    // PROVINCES
    Route::resource('provinces', ProvinceController::class);
    // Get province by id
    Route::get('/getProvince/{id}', [ProvinceController::class, 'showById']);

    // FARMS
    Route::resource('farms', FarmController::class);

    // LOCATIONS
    Route::resource('locations', LocationController::class);

    // INSTRUCTIONS
    Route::resource('instructions', InstructionController::class);
    // Update instruction
    Route::put('/drones/{drone_name}/{instruction_id}', [InstructionController::class, 'updateInstruction']);

    // PLAN
    Route::resource('plans', PlanController::class);   
    // Get plan by id
    Route::get('/getPlan/{id}', [PlanController::class, 'showPlanBy']);
});




