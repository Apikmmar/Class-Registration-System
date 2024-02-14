<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function alluser() {
        $users = User::all();

        return view('ManageUser.alluser', compact('users'));
    }

    public function edituser($id) {
        $user = User::findOrFail($id);

        return view('ManageUser.edituser', compact('user'));
    }

    public function destroyUser($id) {
        $user = User::findOrFail($id);
        $user->forceDelete();

        return redirect(route('alluser'))->with('success', 'User Is Deleted!');
    }

    public function editUserData(Request $request, $id) {
        $user = User::findOrFail($id);
    
        $input['user_name'] = $request->name;
        $input['user_ic'] = $request->ic;
        $input['user_age'] = $request->age;
        $input['user_address'] = $request->address;
        $input['user_hp'] = $request->hp;
        $input['email'] = $request->email;
        $input['role_id'] = $request->role_id;
    
        if ($request->password !== null) {
            $input['password'] = Hash::make($request->password);
        }
    
        $user->update($input);
    
        return redirect(route('edituser', ['id' => $user->id]))->with('success', 'Successfully Update User Profile!');
    }
    
    public function searchUserData(Request $request) {
        $users = User::where('user_name', $request->searchname)->get();
    
        return view('ManageUser.alluser', compact('users'));
    }

    public function filterRoleData(Request $request) {
        $users = User::where('role_id', $request->role_id)->get();

        return view('ManageUser.alluser', compact('users'));
    }
}
