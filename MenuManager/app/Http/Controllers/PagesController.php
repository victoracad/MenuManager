<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\User;
use App\Models\Systemevent;

use Stichoza\GoogleTranslate\GoogleTranslate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    public function login_page($locale){
        return view('pages.admin.login');
    }
    public function dashboard($locale){
        //dd($locale);
        App::setLocale($locale);
        return view('pages.admin.dashboard', ['userauth' => Auth::user()]);
    }
    public function dishes_page($locale){
        App::setLocale($locale);
        return view('pages.admin.dishescategorys', ['userauth' => Auth::user()]);
    }
    public function createDish_page($locale){
        App::setLocale($locale);
        return view('pages.admin.createDish', ['userauth' => Auth::user()]);
    }
    public function category_page($cat, $locale){
        App::setLocale($locale);
        $dishes = Dish::where('type', $cat)->limit(3)->get();
        return view('pages.admin.categorys.category', ['dishes' => $dishes, 'cat' => $cat, 'userauth' => Auth::user()]);
    }
    public function editDish_page($dish_id, $locale){
        App::setLocale($locale);
        $dish = Dish::where('id', $dish_id)->first();
        return view('pages.admin.editDish', ['dish' => $dish, 'userauth' => Auth::user()]);
    }
    public function dish_page($dish_id, $locale){
        App::setLocale($locale);
        $dish = Dish::where('id', $dish_id)->first();
        return view('pages.admin.dish', ['dish' => $dish, 'userauth' => Auth::user()]);
    }
    public function users_page($locale){
        App::setLocale($locale);
        $users = User::all();
        return view('pages.admin.users', ['users' => $users, 'userauth' => Auth::user()]);
    }
    public function createuser_page($locale){
        App::setLocale($locale);
        return view('pages.admin.createUser', ['userauth' => Auth::user()]);
    }
    public function status_page($locale){
        App::setLocale($locale);
        $Systemevents = Systemevent::orderBy('id', 'desc')->limit(10)->get();
        return view('pages.admin.status', ['Systemevents' => $Systemevents, 'userauth' => Auth::user()]);
    }

    /*** PAGESCONTROLLERS CLIENTE */
    public function home_page($locale){
        App::setLocale($locale);
        return view('pages.client.home');
    }
    public function cat_page($cat, $locale){
        App::setLocale($locale);
        $dishes = Dish::where('type', $cat)->where('status', 'Disponível')->get();
        return view('pages.client.category', ['dishes' => $dishes]);
    }
}
