<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\User;
use App\Models\Systemevent;

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
        return view('pages.admin.dishescategorys');
    }
    public function createDish_page(){
        return view('pages.admin.createDish');
    }
    public function category_page($cat){
        $dishes = Dish::where('type', $cat)->limit(3)->get();
        return view('pages.admin.categorys.category', ['dishes' => $dishes, 'cat' => $cat]);
    }
    public function editDish_page($dish_id){
        $dish = Dish::where('id', $dish_id)->first();
        return view('pages.admin.editDish', ['dish' => $dish]);
    }
    public function dish_page($dish_id){
        $dish = Dish::where('id', $dish_id)->first();
        return view('pages.admin.dish', ['dish' => $dish]);
    }
    public function users_page(){
        $users = User::all();
        return view('pages.admin.users', ['users' => $users]);
    }
    public function createuser_page(){
        return view('pages.admin.createUser');
    }
    public function status_page(){
        $Systemevents = Systemevent::limit(5)->get();
        return view('pages.admin.status', ['Systemevents' => $Systemevents]);
    }
}
