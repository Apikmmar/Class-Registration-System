<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function home() {
        return view('ManageDashboard.home');
    }
    
    public function userdirectory() {
        $user = Auth::user();
        $users = User::whereIn('role_id', [2, 3])->whereNotIn('id', [$user->id])->get();

        return view('ManageUser.userdirectory', compact('users'));
    }

    public function profile() {
        $user = Auth::user();

        return view('ManageProfile.profile', compact('user'));
    }

    public function userprofile($id) {
        $user = User::findOrFail($id);

        return view('ManageUser.userprofile', compact('user'));
    }

    public function updateProfile(Request $request, $id) {
        $user = User::findOrFail($id);

        $input['user_name'] = $request->name;
        $input['user_ic'] = $request->ic;
        $input['user_age'] = $request->age;
        $input['user_address'] = $request->address;
        $input['user_hp'] = $request->hp;
        $input['email'] = $request->email;
        $input['password'] = $request->password;

        if ($request->hasFile('photo')) {
            if ($user->user_photopath) {
                Storage::disk('public')->delete($user->user_photopath);
            }

            $file = $request->file('photo');
            $path = $file->store('user-profile', 'public');
            $input['user_photopath'] = $path;
        }

        $user->update($input);

        return redirect(route('profile'))->with('success', 'Successfully Update Profile!');
    }

    public function searchUserDirectory(Request $request) {
        $users = User::where('user_name', $request->searchname)->where('role_id', '<>', 1)->get();

        return view('ManageUser.userdirectory', compact('users'))->with('success', 'Found The User!');
    }
}