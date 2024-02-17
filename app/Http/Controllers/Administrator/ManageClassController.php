<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class ManageClassController extends Controller
{
    //
    public function editclass($id) {
        $class = Classroom::findOrFail($id);
        $students = User::where('role_id', 2)->get();
        $teachers = User::where('role_id', 3)->get();

        return view('ManageFormClass.editclass', compact('class', 'students', 'teachers'));
    }
    
    public function createNewClass(Request $request) {
        $request->validate([
            'class_name' => 'required',
            'class_limit' => 'required',
            'form_id' => 'required',
        ]);

        $data['class_name'] = $request->class_name;
        $data['class_limit'] = $request->class_limit;
        $data['form_id'] = $request->form_id;

        $class = Classroom::create($data);

        return redirect(route('editclass', ['id' => $class->id]))->with('success', 'New Class Created');
    }

    public function editClassData(Request $request, $id) {
        $class = Classroom::findOrFail($id);
        
        $input['class_limit'] = $request->class_limit;
        
        $class->update($input);
        $user = User::where('id', $request->addrole_teacher);
        dd($user->user_name);
        // return redirect(route('editclass', ['id' => $class->id]))->with('success', 'Class Data Changed');
    }

    public function deleteClass($id) {
        $class = Classroom::findOrFail($id);
        $student = User::where('class_id', $class->id);

        $updatedelete['class_id'] = null;
        
        $student->update($updatedelete);
        $class->delete();
        
        return redirect(route('formdetails', ['id' => $class->form_id]))->with('success', 'Successfully Deleted Class');
    }

    public function adddropStudentClass(Request $request, $id) {
        $student = User::findOrFail($id);
        
        $action = $request->input('action');
        $classid = [];
        
        if ($action == 'addstd') {
            $classid['class_id'] = $request->class_id;
            $student->update($classid);
            
            return redirect(route('editclass', ['id' => $request->class_id]))->with('success', 'Student Added to Class');
        } elseif ($action == 'dropstd') {
            $class = Classroom::findOrFail($student->classroom->id);
            
            $classid['class_id'] = null;
            $student->update($classid);

            return redirect(route('editclass', ['id' => $class->id]))->with('success', 'Student Dropped from Class');
        }
    }
    
}