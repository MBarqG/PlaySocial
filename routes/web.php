<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Route::get('/Signup',[UserController::class,'SignUp']);

// create user
Route::post('/users',[UserController::class,'store']);

// Login
Route::get('/Login', [UserController::class, 'login'])->name('Login');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log Out
Route::post('/Logout', [UserController::class, 'logout']);


//profile page
Route::get('/Profile', [UserController::class, 'OpenProfile'])->middleware('auth')->name('Profile');

Route::get('/video', [UserController::class, 'OpenContent']);