<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\User;
use App\Models\Statdish;
use App\Models\Systemevent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function imageTreat($requestImage, $path){
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('images/'. $path), $imageName);
        return $imageName;
    }
    public function apiGptTranslate($desc_pt){
        $apiKey = "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";
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
                'month' => date('n'), 
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
        $dish = Dish::findOrFail($dish_id);

        $images = json_decode($dish->images, true) ?? [];
        $updateInfoArray = [];

        if ($request->hasFile('image_1') && !($request->hasFile('image_2'))) {//Mudou só primeira imagem
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

        $nameDish = Dish::where('id', $dish_id)->first()->name;
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

    //endpoint
    public function index()
    {
        return response()->json(Statdish::all());
    }
}
