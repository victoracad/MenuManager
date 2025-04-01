<?php

namespace App\Http\Controllers;

use App\Models\Dish;
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
}
