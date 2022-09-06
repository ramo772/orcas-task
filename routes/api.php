<?php

use App\Http\Controllers\WebService\AuthController;
use App\Http\Controllers\WebService\ApiController;
use App\Http\Controllers\WebService\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::apiResource('user', UserController::class)->middleware('auth:api');
Route::get('search', [UserController::class,'search'])->middleware('auth:api');
Route::apiResource('apis', ApiController::class);
