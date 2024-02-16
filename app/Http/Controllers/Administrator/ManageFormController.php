<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Form;
use Illuminate\Http\Request;

class ManageFormController extends Controller
{
    //
    public function allforms() {
        $forms = Form::all();
        $classes = Classroom::all();

        return view('ManageFormClass.allforms', compact('forms', 'classes'));
    }
    
    public function formdetails($id) {
        $form = Form::findOrFail($id);

        $numofstd = $form->students->count();

        return view('ManageFormClass.formdetails', compact('form', 'numofstd'));
    }

    public function editformdetails(Request $request, $id) {
        $form = Form::findOrFail($id);

        $input['form_class'] = $request->form_class;

        $form->update($input);

        return redirect(route('formdetails', ['id' => $form->id]))->with('success', 'Successfully Number of Classes');
    }
    
}
