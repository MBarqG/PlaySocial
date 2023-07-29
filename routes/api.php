<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

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

Route::get('/Search-Videos-By-Name',[APIController::class,'videoSearchByName']);
Route::get('/Search-Videos-By-Id',[APIController::class,'videoSearchById']);
Route::get('/Get-users-Info-By-Name',[APIController::class,'usersByName']);
Route::get('/Get-users-Info-By-Id',[APIController::class,'usersById']);