<?php

namespace App\Http\Controllers;
/**MODELS */
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $username = $request->input('username');
        $password = $request->input('password');
        
        if (Auth::attempt(['username' => $username, 'password' => $password]))
	    {
            return redirect('/admin/dashboard')->with('sucess', 'Usuário fez login');
        }
        return view('pages.admin.login')->with('error', 'Usuário ou senha incorretos');
    }

    public function logout(Request $request){
        Auth::logout(); 

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
