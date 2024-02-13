<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home() {
        return view('ManageDashboard.home');
    }

    public function profile() {
        return view('ManageProfile.profile');
    }
}