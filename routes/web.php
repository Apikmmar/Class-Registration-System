<?php

use App\Http\Controllers\Adminstrator\AdminAddUserController;
use Illuminate\Auth\AuthManager;
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

Route::get('/registeruser', function () {
    return view('ManageLoginAndRegistration.registeruser');
})->name('registeruser');

Route::post('/registeruser', [AdminAddUserController::class, 'registeruserPost'])->name('registeruser.post');


Route::get('/login', function () {
    return view('ManageLoginAndRegistration.login');
})->name('login');

Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::middleware(['auth'])->group(function() {
    Route::get('/home', function () {
        return view('ManageDashboard.home');
    })->name('home');
});