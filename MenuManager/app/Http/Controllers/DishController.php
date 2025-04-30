<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\User;
use App\Models\Statdish;
use App\Models\Systemevent;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    public function imageTreat($requestImage, $path){
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('images/'. $path), $imageName);
        return $imageName;
    }
    public function apiGptTranslate($desc_pt){
        
        $apiKey = env('APIKEYGPT');
        $url = "https://api.openai.com/v1/chat/completions";

        $data = [
            "model" => "gpt-4-turbo",
            "messages" => [
                ["role" => "system", "content" => "Traduza a seguinte descrição de prato escrita em português brasileiro para o inglês e o espanhol. As traduções devem ser adaptativas, mantendo o sentido cultural e gastronômico sem serem literais, se for necessário, inclua um parenteses para explicar algum trecho. Retorne o resultado no seguinte formato JSON: {\"desc_pt\":\"Descrição original\",\"desc_in\":\"tradução em inglês\",\"desc_es\":\"tradução em espanhol\"}."],
                ["role" => "user", "content" => $desc_pt]
            ],
            "temperature" => 0.7
        ];

        $headers = [
            "Authorization: Bearer $apiKey",
            "Content-Type: application/json"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
    public function createDish(Request $request){
        $updateInfoArray = [];
        $request->validate([
                'image_1' => 'required|image',
                'name' => 'required|string|min:5|max:200',
                'description' => 'required|string|max:150',
                'price' => 'required|numeric',
                'numMenu' => 'required|numeric',
                'type' => 'required',
                'image_2' => 'required|image',
            ],
            [
                'image_1.required' => 'Por favor, insira uma imagem.',
                'image_1.image' => 'O arquivo enviado não é compativel.',
                'image_2.required' => 'Por favor, insira uma imagem.',
                'image_2.image' => 'O arquivo enviado não é compativel.',
                'name.required' => 'Por favor, informe um nome.',
                'name.min' => 'O nome precisa ter pelo menos 5 caracteres.',
                'name.max' => 'O nome não pode ter mais de 200 caracteres.',
                'description.required' => 'Informe uma descrição.',
                'description.string' => 'A descrição deve ser uma string.',
                'description.max' => 'A descrição deve ter no máximo 150.',
                'price.required' => 'Por favor, informe o preço.',
                'price.numeric' => 'O preço deve ser um número.',
                'numMenu.required' => 'Por favor, informe o número do prato.',
                'numMenu.numeric' => 'O numero do prato deve ser um número.',
                'type.required' => 'Informe a categoria do prato.',
            ]
        );
        if ($request->hasFile('image_1') && $request->hasFile('image_2')) {
            $images['image_1'] = $this->imageTreat($request->image_1, 'imagesdish/'); 
            $images['image_2'] = $this->imageTreat($request->image_2, 'imagesdish/'); 
            $imagesJson = json_encode($images);
            //dd($request->description);
            //SISTEMA DE TRADUÇÃO
            $description_lg = $this->apiGptTranslate($request->description);
            $data = json_decode($description_lg);
            $descriptions_lg = $data->choices[0]->message->content;
            ////////////

            $dish = Dish::create([
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $descriptions_lg,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ]);
            
            Statdish::create([
                'dishes_id' => $dish->id, // Pega o ID do produto recém-criado
                'period' => date('Y/m'), 
            ]);
            $updateInfoArray = [
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $descriptions_lg,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ];
        }
        
        $updateInfo = json_encode($updateInfoArray);  
        Systemevent::create([
            'typechange' => 'update', 
            'tablechange' => 'dishes',
            'update_info' => $updateInfo,
            'users_id' => Auth::id(),
        ]);

        return redirect(route('dashboard', ['locale' => 'pt']))->with('sucess', 'Prato Criado com sucesso');
    }
    public function updateDish(Request $request, $dish_id){
        $request->validate([
                'name' => 'required|string|min:5|max:200',
                'description' => 'required|string|max:150',
                'price' => 'required|numeric',
                'numMenu' => 'required|numeric',
                'type' => 'required',
            ],
            [
                'name.required' => 'Por favor, informe um nome.',
                'name.min' => 'O nome precisa ter pelo menos 5 caracteres.',
                'name.max' => 'O nome não pode ter mais de 200 caracteres.',
                'description.required' => 'Informe uma descrição.',
                'description.string' => 'A descrição deve ser uma string.',
                'description.max' => 'A descrição deve ter no máximo 150.',
                'price.required' => 'Por favor, informe o preço.',
                'price.numeric' => 'O preço deve ser um número.',
                'numMenu.required' => 'Por favor, informe o número do prato.',
                'numMenu.numeric' => 'O numero do prato deve ser um número.',
                'type.required' => 'Informe a categoria do prato.',
            ]
        );

        $dish = Dish::findOrFail($dish_id);

        $images = json_decode($dish->images, true) ?? [];
        $updateInfoArray = [];
        
        if ($request->hasFile('image_1') && !($request->hasFile('image_2'))) {//Mudou só primeira imagem
            if (file_exists(public_path('images/imagesdish/'.json_decode($dish->images, true)['image_1']))) {
                unlink(public_path('images/imagesdish/'.json_decode($dish->images, true)['image_1']));
            }
            $images['image_1'] = $this->imageTreat($request->image_1, 'imagesdish/'); 
            $imagesJson = json_encode($images);
            if(json_decode(Dish::find($dish_id)->description)->desc_pt == $request->description){//Não mudou a descrição
                Dish::where('id', $dish_id)->update([
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ]);
                $updateInfoArray = [
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ];
            }else{//Mudou a descrição
                //SISTEMA DE TRADUÇÃO
                $description_lg = $this->apiGptTranslate($request->description);
                $data = json_decode($description_lg);
                $descriptions_lg = $data->choices[0]->message->content;
                ////////////

                Dish::where('id', $dish_id)->update([
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'description' => $descriptions_lg,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ]);
                $updateInfoArray = [
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'description' => $descriptions_lg,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ];
            }
            
        }
        if ($request->hasFile('image_2') && !($request->hasFile('image_1'))) {//Mudou só segunda imagem
            if (file_exists(public_path('images/imagesdish/'.json_decode($dish->images, true)['image_2']))) {
                unlink(public_path('images/imagesdish/'.json_decode($dish->images, true)['image_2']));
            }
            $images['image_2'] = $this->imageTreat($request->image_2, 'imagesdish/'); 
            $imagesJson = json_encode($images);
            if(json_decode(Dish::find($dish_id)->description)->desc_pt == $request->description){//Não mudou a descrição
                Dish::where('id', $dish_id)->update([
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ]);
                $updateInfoArray = [
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ];
            }else{//Mudou a descrição
                //SISTEMA DE TRADUÇÃO
                $description_lg = $this->apiGptTranslate($request->description);
                $data = json_decode($description_lg);
                $descriptions_lg = $data->choices[0]->message->content;
                ////////////

                Dish::where('id', $dish_id)->update([
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'description' => $descriptions_lg,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ]);
                $updateInfoArray = [
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'description' => $descriptions_lg,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ];
            }
        }
        if($request->hasFile('image_2') && ($request->hasFile('image_1'))){//Mudou as duas imagens
            if (file_exists(public_path('images/imagesdish/'.json_decode($dish->images, true)['image_1']))) {
                unlink(public_path('images/imagesdish/'.json_decode($dish->images, true)['image_1']));
            }
            if (file_exists(public_path('images/imagesdish/'.json_decode($dish->images, true)['image_2']))) {
                unlink(public_path('images/imagesdish/'.json_decode($dish->images, true)['image_2']));
            }
            $images['image_2'] = $this->imageTreat($request->image_2, 'imagesdish/'); 
            $images['image_1'] = $this->imageTreat($request->image_1, 'imagesdish/'); 
            $imagesJson = json_encode($images);
            if(json_decode(Dish::find($dish_id)->description)->desc_pt == $request->description){//Não mudou a descrição
                Dish::where('id', $dish_id)->update([
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ]);
                $updateInfoArray = [
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ];
            }else{//Mudou a descrição
                //SISTEMA DE TRADUÇÃO
                $description_lg = $this->apiGptTranslate($request->description);
                $data = json_decode($description_lg);
                $descriptions_lg = $data->choices[0]->message->content;
                ////////////

                Dish::where('id', $dish_id)->update([
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'description' => $descriptions_lg,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ]);
                $updateInfoArray = [
                    'name' => $request->name,
                    'images' => $imagesJson,
                    'description' => $descriptions_lg,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ];
            }
        }

        if(!$request->hasFile('image_2') && !$request->hasFile('image_1')){ //Não mudou nenhuma imagem
            if(json_decode(Dish::find($dish_id)->description)->desc_pt == $request->description){//Não mudou a descrição
                Dish::where('id', $dish_id)->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ]);
                $updateInfoArray = [
                    'name' => $request->name,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ];
            }else{//Mudou a descrição
                //SISTEMA DE TRADUÇÃO
                $description_lg = $this->apiGptTranslate($request->description);
                $data = json_decode($description_lg);
                $descriptions_lg = $data->choices[0]->message->content;
                ////////////
                Dish::where('id', $dish_id)->update([
                    'name' => $request->name,
                    'description' => $descriptions_lg,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ]);
                $updateInfoArray = [
                    'name' => $request->name,
                    'description' => $descriptions_lg,
                    'price' => $request->price,
                    'type' => $request->type,
                    'numMenu' => $request->numMenu,
                ];
            }
        }
        
        $updateInfo = json_encode($updateInfoArray);  
        Systemevent::create([
            'typechange' => 'update', 
            'tablechange' => 'dishes',
            'update_info' => $updateInfo,
            'users_id' => Auth::id(),
        ]);

        return redirect(route('dashboard', ['locale' => 'pt']))->with('sucess', 'Dados atualizados com sucesso');
    }
    public function deleteDish(Request $request, $dish_id){
        $updateInfoArray = [];

        $Dish = Dish::where('id', $dish_id)->first();
        $nameDish = $Dish->name;
        if (file_exists(public_path('images/imagesdish/'.json_decode($Dish->images, true)['image_1']))) {
            unlink(public_path('images/imagesdish/'.json_decode($Dish->images, true)['image_1']));
        }
        if (file_exists(public_path('images/imagesdish/'.json_decode($Dish->images, true)['image_2']))) {
            unlink(public_path('images/imagesdish/'.json_decode($Dish->images, true)['image_2']));
        }
        $updateInfoArray = [
            'name' => $nameDish
        ];

        $dish = Dish::findOrFail($dish_id);
        $dish->delete();

        $updateInfo = json_encode($updateInfoArray);  
        Systemevent::create([
            'typechange' => 'delete', 
            'tablechange' => 'dishes',
            'update_info' => $updateInfo,
            'users_id' => Auth::id(),
        ]);
        return redirect(route('dishes.page', ['locale' => 'pt']))->with('sucess', 'Prato Excluído com sucesso');
    }
    public function changeStatusDish($dish_id)
    {
        $dish = Dish::find($dish_id);
        
        //return $dish->status;
        if (!$dish) {
            return response()->json(['message' => 'Prato não encontrado'], 404);
        }
        if($dish->status == 'Disponível'){
            Dish::where('id', $dish_id)->update([
                'status' => 'Indisponível'
            ]);
            return response()->json([
                'message' => 'Status do prato mudado com sucesso', 'status' => 'Indisponível'
            ], 200);
        }else{
            Dish::where('id', $dish_id)->update([
                'status' => 'Disponível'
            ]);
            return response()->json([
                'message' => 'Status do prato mudado com sucesso', 'status' => 'Disponível'
            ], 200);
        }
    
        
    }
    public function updateAbout(Request $request, $locale){
        $request->validate([
                'description' => 'required|string|max:150',
                'url_facebook' => 'required|string',
                'url_instagram' => 'required|string',
                'telefone' => 'required|string',
            ],
            [
                'description.required' => 'Informe uma descrição.',
                'description.string' => 'A descrição deve ser uma string.',
                'description.max' => 'A descrição deve ter no máximo 150.',
                'url_facebook.required' => 'Por favor, informe uma url do facebook.',
                'url_instagram.required' => 'Por favor, informe uma url do instagram.',
                'telefone.required' => 'Por favor, informe um número de telefone.',
            ]
        );
        $About = About::where('id', 1)->first();

        $localizationsArray = [];
        $localizationsArray['latitude'] = $request->latitude;
        $localizationsArray['longitude'] = $request->longitude;
        $localizationsArray['address'] = $request->address;

        $localizationsJSON = json_encode($localizationsArray);
        
        if ($request->image) { //Alterou a imagem
            if (file_exists(public_path('images/imagesAbout/'.$About->image))) {
                unlink(public_path('images/imagesAbout/'.$About->image));
            }
            About::updateOrInsert(
                ['id' => 1],
                [
                    'description' => $request->description,
                    'image' => $this->imageTreat($request->image, 'imagesAbout/'),
                    'localizations' => $localizationsJSON,
                    'url_facebook' => $request->url_facebook,
                    'url_instagram' => $request->url_instagram,
                    'telefone' => $request->telefone,
                ]
            );
        }else{
            About::updateOrInsert(
                ['id' => 1],
                [
                    'description' => $request->description,
                    'localizations' => $localizationsJSON,
                    'url_facebook' => $request->url_facebook,
                    'url_instagram' => $request->url_instagram,
                    'telefone' => $request->telefone,
                ]
            );
        }
        

        return redirect(route('dashboard', ['locale' => 'pt']))->with('sucess', 'Sobre, Alterado com sucesso');
    }

    public function test($locale){
        $path = public_path('images/imagesdish/teste.jpg');

        if (file_exists(public_path('images/imagesdish/teste.jpg'))) {
            unlink($path);
            return 'o arquivo existe e foi excluído';
        }

        return 'arquivo não existe';
    }

}
