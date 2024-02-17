<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;

class ManageClassController extends Controller
{
    //
    public function editclass($id) {
        $class = Classroom::findOrFail($id);

        return view('ManageFormClass.editclass', compact('class'));
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
        
        return redirect(route('editclass', ['id' => $class->id]))->with('success', 'Student Limit Changed');
    }

    public function deleteClass($id) {
        $class = Classroom::findOrFail($id);
        $student = User::where('class_id', $class->id);

        $updatedelete['class_id'] = null;
        
        $student->update($updatedelete);
        $class->delete();
        
        return redirect(route('formdetails', ['id' => $class->form_id]))->with('success', 'Successfully Deleted Class');
    }
}