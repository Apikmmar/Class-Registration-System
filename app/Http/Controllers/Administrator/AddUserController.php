<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function registerUser() {
        return view('ManageLoginAndRegistration.registeruser');
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
}
