<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
