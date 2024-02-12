<?php

use App\Http\Controllers\Adminstrator\AdminAddUserController;
use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/home', function () {
        return view('ManageDashboard.home');
    })->name('home');

    // USE BY ADMIN ONLY
    Route::get('/registeruser', [AdminAddUserController::class, 'registerUser'])->name('registeruser');
    Route::post('/registeruser', [AdminAddUserController::class, 'registerUserPost'])->name('registeruser.post');
});