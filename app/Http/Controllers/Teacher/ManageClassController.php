<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;

class ManageClassController extends Controller
{
    //
    public function formclasslist() {
        $forms = Form::all();

        return view('ManageFormClass.formclasslist', compact('forms'));
    }
    
    public function classdetails($id) {
        $class = Classroom::findOrFail($id);
        $teacher = User::where('role_id', 3)->where('class_id', $class->id)->first();
        $students = User::where('role_id', 2)->where('class_id', $class->id)->get();

        return view('ManageFormClass.classdetails', compact('class', 'teacher', 'students'));
    }

    public function manageclass() {
        return view('ManageFormClass.manageclass');
    }
}