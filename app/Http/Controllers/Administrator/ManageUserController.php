<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function registerUser() {
        return view('ManageLoginAndRegistration.registeruser');
    }

    public function alluser() {
        $users = User::all();

        return view('ManageUser.alluser', compact('users'));
    }

    public function edituser($id) {
        $user = User::findOrFail($id);

        return view('ManageUser.edituser', compact('user'));
    }

    public function registerUserPost(Request $request) {
        $request->validate([
            'user_name' => 'required',
            'user_ic' => 'required',
            'user_age' => 'required',
            'user_address' => 'required',
            'user_hp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $data['user_name'] = $request->user_name;
        $data['user_ic'] = $request->user_ic;
        $data['user_age'] = $request->user_age;
        $data['user_address'] = $request->user_address;
        $data['user_hp'] = $request->user_hp;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role_id'] = $request->role_id;

        $user = User::create($data);

        if(!$user) {
            return redirect(route('registeruser'))->with("error", "User Has Registered In Database");
        }
            
        return redirect(route('registeruser'))->with("success", "Registration successful!");
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
