<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\User;
use App\Models\Systemevent;
use App\Models\Statdish;
use App\Models\Sitestat;
use App\Models\About;



use Stichoza\GoogleTranslate\GoogleTranslate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{   

    public function RegisterSiteVisit()
    {

        if (!isset($_COOKIE['alreadyView'])) {
            Sitestat::updateOrInsert(
                ['period' => date('Y/m')], 
                ['views' => DB::raw('views + 1')] 
            );

            setcookie("alreadyView", true, time() + 1800, "/");

            return response('Nova visita registrada.');
        }

        return response('Visitante já contado.');
    }

    public function login_page($locale){
        return view('pages.admin.login');
    }
    public function dashboard($locale){
        $viewsSiteMonth = Sitestat::where('period', date('Y/m'))
        ->first();
        $allViewsSite = Sitestat::all();
        $totalviewsSite = 0;
        foreach ($allViewsSite as $ViewsSite) {
            $totalviewsSite = $totalviewsSite + $ViewsSite->views;
        }

        $mostViewsDish = Statdish::whereNotNull('views')
        ->where('period', date('Y/m'))
        ->orderByDesc('views')
        ->first();
        App::setLocale($locale);
        return view('pages.admin.dashboard', ['userauth' => Auth::user(), 'DishViews' => $mostViewsDish, 'siteViews' => $viewsSiteMonth, 'AllViews' => $totalviewsSite]);
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
        $formatter = new \NumberFormatter('pt_BR', \NumberFormatter::CURRENCY);
        App::setLocale($locale);
        $dishes = Dish::where('type', $cat)->get();
        return view('pages.admin.categorys.category', ['dishes' => $dishes, 'cat' => $cat, 'userauth' => Auth::user(), 'formatter' => $formatter]);
    }
    public function editDish_page($dish_id, $locale){
        App::setLocale($locale);
        $dish = Dish::where('id', $dish_id)->first();
        return view('pages.admin.editDish', ['dish' => $dish, 'userauth' => Auth::user()]);
    }
    public function dish_page($dish_id, $locale){
        $formatter = new \NumberFormatter('pt_BR', \NumberFormatter::CURRENCY);
        App::setLocale($locale);
        $dish = Dish::where('id', $dish_id)->first();
        return view('pages.admin.dish', ['dish' => $dish, 'userauth' => Auth::user(), 'formatter' => $formatter]);
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
    public function statsSystem_page($locale){
        App::setLocale($locale);
        return view('pages.admin.statsSystem', ['userauth' => Auth::user(), ]);
    }
    public function admin_about_page($locale){
        App::setLocale($locale);
        $about = About::where('id', 1)->first();
        return view('pages.admin.about', ['userauth' => Auth::user(), 'about' => $about]);
    }

    /*** PAGESCONTROLLERS CLIENTE */
    public function home_page($locale){
        $this->RegisterSiteVisit();
        App::setLocale($locale);
        $currentUrl = url()->current(); 
        $segments = explode('/', $currentUrl);
        array_pop($segments); 
        $baseUrl = implode('/', $segments); 

        return view('pages.client.home', ['urlNoLocation' => $baseUrl]);
    }
    public function cat_page($cat, $locale){
        $this->RegisterSiteVisit();
        $formatter = new \NumberFormatter('pt_BR', \NumberFormatter::CURRENCY);
        App::setLocale($locale);
        $currentUrl = url()->current(); 
        $segments = explode('/', $currentUrl);
        array_pop($segments); 
        $baseUrl = implode('/', $segments);

        $dishes = Dish::where('type', $cat)->where('status', 'Disponível')->get();

        return view('pages.client.category', ['dishes' => $dishes, 'urlNoLocation' => $baseUrl, 'cat' => $cat, 'formatter' => $formatter]);
    }

    public function dish_page_client($dish_id, $locale){
        $this->RegisterSiteVisit();
        Statdish::updateOrInsert(
            ['dishes_id' => $dish_id], 
            ['views' => DB::raw('views + 1')] 
        );

        $formatter = new \NumberFormatter('pt_BR', \NumberFormatter::CURRENCY);
        App::setLocale($locale);
        $currentUrl = url()->current(); 
        $segments = explode('/', $currentUrl);
        array_pop($segments); 
        $baseUrl = implode('/', $segments);

        $dish = Dish::where('id', $dish_id)->where('status', 'Disponível')->first();

        return view('pages.client.dish', ['dish' => $dish, 'urlNoLocation' => $baseUrl, 'formatter' => $formatter]);
    }
    public function about_page($locale){
        $about = About::where('id', 1)->first();

        $currentUrl = url()->current(); 
        $segments = explode('/', $currentUrl);
        array_pop($segments); 
        $baseUrl = implode('/', $segments);
        App::setLocale($locale);
        $this->RegisterSiteVisit();
        return view('pages.client.about', ['urlNoLocation' => $baseUrl, 'about' => $about]);
    }


}
