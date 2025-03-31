<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function login_page(){
        return view('pages.admin.login');
    }
    public function dashboard(){
        return view('pages.admin.dashboard', ['user' => Auth::user()]);
    }
    public function dishes_page(){
        return view('pages.admin.dishes');
    }
}
