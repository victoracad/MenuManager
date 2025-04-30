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
    public function login(Request $request, $locale){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $username = $request->input('username');
        $password = $request->input('password');
        
        if (Auth::attempt(['username' => $username, 'password' => $password]))
	    {
            return redirect(route('dashboard', ['locale' => 'pt']))->with('sucess', 'Usuário fez login');
        }
        return view('pages.admin.login')->with('error', 'Usuário ou senha incorretos');
    }
    public function logout(Request $request, $locale){
        Auth::logout(); 

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(Route('login', ['locale'=>'pt']));
    }
    public function createUser(Request $request, $locale){
        $updateInfoArray = [];
        $request->validate([
                'username' => 'required|string|unique:users,username|min:5|max:20',
                'name' => 'required|string|min:5|max:20',
                'password' => 'required|string|min:8',
                'admin_type' => 'required',
                'avatar_image' => 'required|image',
            ],
            [
                'username.required' => 'Por favor, informe um nome de usuário.',
                'username.min' => 'O nome de usuário precisa ter pelomenos 5 caracteres.',
                'username.max' => 'O nome de usuário não pode ter mais de 20 caracteres.',
                'username.unique' => 'O nome de usuário já foi escolhido.',
                'name.required' => 'Por favor, informe um nome.',
                'name.min' => 'O nome precisa ter pelomenos 5 caracteres.',
                'name.max' => 'O nome não pode ter mais de 20 caracteres.',
                'password.required' => 'Senha é obrigatória.',
                'password.min' => 'A senha precisa ter pelo menos 8 caracteres.',
                'admin_type.required' => 'Escolha uma das opções.',
                'avatar_image.required' => 'Insira uma imagem.',
                'avatar_image.image' => 'O arquivo não é aceito.',
            ]
        );
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

        return redirect(route('users.page', ['locale'=>'pt']))->with('sucess', 'Usuário criado com sucesso');

    }
    public function deleteUser($user_id, $locale){
        $user = User::where('id', $user_id)->first();
        $updateInfoArray = [];
        if(Auth::user()->admin_type === 'Master' && Auth::id() != $user_id){
            $updateInfoArray = [
                'username' => User::where('id', $user_id)->first()->username,
            ];
            if (file_exists(public_path('images/imagesusers/'.$user->profile->avatar_image))) {
                unlink(public_path('images/imagesusers/'.$user->profile->avatar_image));
            }
            User::where('id', $user_id)->delete();
            
            $updateInfo = json_encode($updateInfoArray);  
            Systemevent::create([
                'typechange' => 'delete', 
                'tablechange' => 'users',
                'update_info' => $updateInfo,
                'users_id' => Auth::id(),
            ]);

            return redirect(route('users.page', ['locale'=>'pt']))->with('sucess', 'Usuário excluído com sucesso');
        }
        return redirect(route('users.page', ['locale'=>'pt']))->with('error', 'Você não pode excluir esse usuário');
        
    }
}
