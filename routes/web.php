<?php

use App\Http\Controllers\Administrator\AddUserController;
use App\Http\Controllers\Administrator\ManageUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// USE BY ADMIN, STUDENT & TEACHER 
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {
    
    // USE BY ADMIN, STUDENT & TEACHER 
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [UserController::class, 'updateProfile'])->name('profile.update');

    // USE BY ADMIN ONLY
    Route::get('/registeruser', [AddUserController::class, 'registerUser'])->name('registeruser');
    Route::post('/registeruser', [AddUserController::class, 'registerUserPost'])->name('registeruser.post');
    Route::get('/alluser', [ManageUserController::class, 'alluser'])->name('alluser');
    Route::delete('/alluser/{id}', [ManageUserController::class, 'destroyUser'])->name('user.destroy');
    Route::get('/edituser/{id}', [ManageUserController::class, 'edituser'])->name('edituser');
});