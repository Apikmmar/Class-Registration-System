<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $teacher = Auth::user();
        $class = Classroom::findOrFail($teacher->class_id);
        $students = User::where('role_id', 2)->where('class_id', $class->id)->get();
        return view('ManageFormClass.manageclass', compact('teacher', 'class', 'students'));
    }

    public function updateClassDetails(Request $request) {
        $teacher = Auth::user();
        $class_id = $teacher->class_id;
        
        Classroom::findOrFail($class_id)->update(['class_name' => $request->class_name]);

        if (User::where('id', $request->rep)->where('addrole_id', '=', null)->exists()) {
            User::where('role_id', 2)->where('class_id', $class_id)->where('addrole_id', 2)->update(['addrole_id' => null]);
            User::where('id', $request->rep)->update(['addrole_id' => 2]);
        }
        // else {
        //     return redirect(route('manageclass'))->with('fail', 'Student Already Has Role In Class');
        // }

        if (User::where('id', $request->vicerep)->where('addrole_id', '=', null)->exists()) {
            User::where('role_id', 3)->where('class_id', $class_id)->where('addrole_id', 3)->update(['addrole_id' => null]);
            User::where('id', $request->vicerep)->update(['addrole_id' => 3]);
        }
        // else {
        //     return redirect(route('manageclass'))->with('fail', 'Student Already Has Role In Class');
        // }

        if (User::where('id', $request->sec)->where('addrole_id', '=', null)->exists()) {
            User::where('role_id', 4)->where('class_id', $class_id)->where('addrole_id', 4)->update(['addrole_id' => null]);
            User::where('id', $request->sec)->update(['addrole_id' => 4]);
        }
        // else {
        //     return redirect(route('manageclass'))->with('fail', 'Student Already Has Role In Class');
        // }

        if (User::where('id', $request->tre)->where('addrole_id', '=', null)->exists()) {
            User::where('role_id', 5)->where('class_id', $class_id)->where('addrole_id', 5)->update(['addrole_id' => null]);
            User::where('id', $request->tre)->update(['addrole_id' => 5]);
        }
        // else {
        //     return redirect(route('manageclass'))->with('fail', 'Student Already Has Role In Class');
        // }

        return redirect(route('manageclass'))->with('success', 'Successfully Update Class Info');
    }
}