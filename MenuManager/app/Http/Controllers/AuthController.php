<?php

namespace App\Http\Controllers;
/**MODELS */
use App\Models\User;
use App\Models\Userprofile;
use App\Models\Systemevent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function imageTreat($requestImage, $path){
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('images/'. $path), $imageName);
        return $imageName;
    }
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
    public function createUser(Request $request){
        $updateInfoArray = [];
        if ($request->hasFile('avatar_image')) { 
             $avatar_image = $this->imageTreat($request->avatar_image, 'imagesusers/');
        }
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'admin_type' => $request->admin_type,
        ]);
        
        Userprofile::create([
            'name' => $request->name,
            'avatar_image' => $avatar_image,
            'users_id' => $user->id,
        ]);
        $updateInfoArray = [
            'name' => $request->name,
            'username' => $request->username,
            'images' => $avatar_image,
        ];
        $updateInfo = json_encode($updateInfoArray);  
        Systemevent::create([
            'typechange' => 'create', 
            'tablechange' => 'users/users_profile',
            'update_info' => $updateInfo,
            'users_id' => Auth::id(),
        ]);

        return redirect(route('users.page'))->with('sucess', 'Usuário criado com sucesso');

    }
    public function deleteUser($user_id){
        $updateInfoArray = [];
        if(Auth::user()->admin_type === 'Master' && Auth::id() != $user_id){
            $updateInfoArray = [
                'username' => User::where('id', $user_id)->first()->username,
            ];
            User::where('id', $user_id)->delete();
            
            $updateInfo = json_encode($updateInfoArray);  
            Systemevent::create([
                'typechange' => 'delete', 
                'tablechange' => 'users',
                'update_info' => $updateInfo,
                'users_id' => Auth::id(),
            ]);

            return redirect(route('users.page'))->with('sucess', 'Usuário excluído com sucesso');
        }
        return redirect(route('users.page'))->with('error', 'Você não pode excluir esse usuário');
        
    }
}
