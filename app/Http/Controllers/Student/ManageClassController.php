<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Add_Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageClassController extends Controller
{
    //
    public function myclass() {
        $user = Auth::user();
        $classmate = User::where('role_id', 2)->where('class_id', [$user->class_id])->get();
        $classteacher = User::where('role_id', 3)->where('class_id', [$user->class_id])->first();
        $allrole = Add_Role::all();

        return view('ManageFormClass.myclass', compact('user', 'classmate', 'classteacher', 'allrole'));
    }
}