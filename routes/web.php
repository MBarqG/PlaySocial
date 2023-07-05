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
Route::get('/Sign up',[UserController::class,'SignUp'])->middleware('guest');;

// create user
Route::post('/users',[UserController::class,'store']);

// Log Out
Route::post('/Log out', [UserController::class, 'logout'])->middleware('auth');

// Login
Route::get('/Log in', [UserController::class, 'LogIn'])->name('LogIn')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);