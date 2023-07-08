<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('WelcomePage');
});


// Sign up
Route::get('/Sign up',[UserController::class,'SignUp']);

// create user
Route::post('/users',[UserController::class,'store']);

// Log Out
Route::post('/Log out', [UserController::class, 'logout']);

// Login
Route::get('/Log in', [UserController::class, 'login']);

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);