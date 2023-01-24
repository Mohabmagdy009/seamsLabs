<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firstPartController;
use App\Http\Controllers\userController;
use App\Http\Controllers\userAuth;

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

Route::get('partOne/{firstNumber}/{secondNumber}', [firstPartController::class, 'Q1']);
Route::get('partOne/{id}', [firstPartController::class, 'Q2']);
Route::post('partOne', [firstPartController::class, 'Q3']);
Route::resource('users', userController::class);
Route::get('login/{username}/{password}', [userAuth::class, 'userCheck']);

