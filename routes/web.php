<?php

use App\Http\Controllers\SearchController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;

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

Route::get('/', [UserController::class, 'open'])->name("WelcomePage");

// Sign up
Route::get('/Signup', [UserController::class, 'SignUp']);

// create user
Route::post('/users', [UserController::class, 'store']);

// Login
Route::get('/Login', [UserController::class, 'login'])->name('login');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log Out
Route::get('/Logout', [UserController::class, 'logout']);


//profile page
Route::get('/Profile', [UserController::class, 'OpenProfile'])->middleware('auth')->name('Profile');

//open video
Route::get('/video/{id}', [VideoController::class, 'OpenContent']);


//upload video
Route::post("UploadVideo", [VideoController::class, 'upload']);

//add comment
Route::post('{id}/addcomment', [VideoController::class, 'Postcomment']);

//save video
Route::post('{id}/save', [VideoController::class, 'saveVideo']);

//remove from saved list video
Route::post('{id}/unsave', [VideoController::class, 'unsaveVideo']);

//saved video 
Route::get('/saves', [UserController::class, 'OpenSaved'])->middleware('auth')->name('Saved');

//search videos/users
Route::get("/Search", [SearchController::class, 'Search']);
// open others pages
Route::get('/profile/{id}', [SearchController::class, 'OpenChannel'])->middleware('auth')->name('profile');

// follow other users
Route::post('{id}/Follow', [UserController::class, 'Follow']);

//remove from follow list video
Route::post('{id}/unFollow', [UserController::class, 'unFollow']);

//settings page
Route::get('/settings',[UserController::class, 'settings'])->middleware('auth')->name('Settings');

//change user info
Route::post("update", [UserController::class, 'updateUser']);
//delete video

Route::post("DeleteVideo",[UserController::class, 'DeleteVideo']);
