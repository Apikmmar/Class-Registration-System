<?php

use App\Http\Controllers\Administrator\AddUserController;
use App\Http\Controllers\Administrator\ManageClassController;
use App\Http\Controllers\Administrator\ManageFormController;
use App\Http\Controllers\Administrator\ManageUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student\ManageClassController as StudentManageClassController;
use App\Http\Controllers\Teacher\ManageClassController as TeacherManageClassController;
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


    // USE BY STUDENT AND TEACHER
    Route::get('/userdirectory', [UserController::class, 'userdirectory'])->name('userdirectory');
    Route::get('/userdirectory/search', [UserController::class, 'searchUserDirectory'])->name('userdirectory.search');
    Route::get('/userprofile/{id}', [UserController::class, 'userprofile'])->name('userprofile');


    // USE BY ADMIN ONLY
    Route::get('/registeruser', [ManageUserController::class, 'registerUser'])->name('registeruser');
    Route::post('/registeruser', [ManageUserController::class, 'registerUserPost'])->name('registeruser.post');
    Route::get('/alluser', [ManageUserController::class, 'alluser'])->name('alluser');
    Route::get('/alluser/search', [ManageUserController::class, 'searchUserData'])->name('alluser.search');    
    Route::get('/alluser/filter', [ManageUserController::class, 'filterRoleData'])->name('alluser.filter');    
    Route::delete('/alluser/{id}', [ManageUserController::class, 'destroyUser'])->name('user.destroy');
    Route::get('/edituser/{id}', [ManageUserController::class, 'edituser'])->name('edituser');
    Route::put('/edituser/{id}', [ManageUserController::class, 'editUserData'])->name('edituser.edit');

    Route::get('/allforms', [ManageFormController::class, 'allforms'])->name('allforms');
    Route::get('/formdetails/{id}', [ManageFormController::class, 'formdetails'])->name('formdetails');
    Route::put('/formdetails/{id}', [ManageFormController::class, 'editformdetails'])->name('formdetails.edit');
    
    Route::get('/editclass/{id}', [ManageClassController::class, 'editclass'])->name('editclass');
    Route::post('/formdetails', [ManageClassController::class, 'createNewClass'])->name('editclass.create');
    Route::put('/editclass/{id}', [ManageClassController::class, 'editClassData'])->name('editclass.edit');
    Route::delete('/formdetails/{id}', [ManageClassController::class, 'deleteClass'])->name('class.delete');
    Route::put('/editclass/{id}/addordrop', [ManageClassController::class, 'adddropStudentClass'])->name('editclass.adddropstd');


    // USE BY USER ONLY
    Route::get('/myclass', [StudentManageClassController::class, 'myclass'])->name('myclass');

    // USE  BY TEACHER ONLY
    Route::get('/formclasslist', [TeacherManageClassController::class, 'formclasslist'])->name('formclasslist');
    Route::get('/classdetails/{id}', [TeacherManageClassController::class, 'classdetails'])->name('classdetails');
    Route::get('/manageclass', [TeacherManageClassController::class, 'manageclass'])->name('manageclass');
    Route::put('/manageclass/id', [TeacherManageClassController::class, 'updateClassDetails'])->name('manageclass.edit');
    Route::get('/manageclass/droprole/{id}', [TeacherManageClassController::class, 'dropStudentRole'])->name('manageclass.drop');
});