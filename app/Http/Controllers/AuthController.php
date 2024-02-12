<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    protected $session;

    public function __construct(Store $session) {
        $this->session = $session;
    }

    public function login() {
        return view('ManageLoginAndRegistration.login');
    }

    public function loginPost(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if($user->role_id == $request->input('role_id')) {
                if (($user->role_id == 1) || ($user->role_id == 2) || ($user->role_id == 3)) {
                    return redirect()->intended(route('home'));
                }
            }
        }

        return redirect(route('login'))->with("error", "Login Invalid");
    }
}
