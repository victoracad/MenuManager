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
    public function createDish(Request $request){
        $updateInfoArray = [];

        if ($request->hasFile('image_1')) {//Mandou a primeira imagem
            $images['image_1'] = $this->imageTreat($request->image_1, 'imagesdish/'); 
            $imagesJson = json_encode($images);

            $dish = Dish::create([
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ]);
            
            Statdish::create([
                'dishes_id' => $dish->id, // Pega o ID do produto recém-criado
            ]);
            $updateInfoArray = [
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ];
        }
        if ($request->hasFile('image_2')) {//Mandou a segunda imagem
            $images['image_2'] = $this->imageTreat($request->image_2, 'imagesdish/'); 
            $imagesJson = json_encode($images);

            $dish = Dish::create([
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ]);
            
            Statdish::create([
                'dishes_id' => $dish->id, // Pega o ID do produto recém-criado
            ]);
            $updateInfoArray = [
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ];
        }

        if(!$request->hasFile('image_2') && !$request->hasFile('image_1')){ //Não mandou nenhuma imagem
            $dish = Dish::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ]);
            
            Statdish::create([
                'dishes_id' => $dish->id, // Pega o ID do produto recém-criado
            ]);
            $updateInfoArray = [
                'name' => $request->name,
                'description' => $request->description,
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

        return redirect(route('createDish.page'))->with('sucess', 'Prato Criado com sucesso');
    }
    public function updateDish(Request $request, $dish_id){
        $dish = Dish::findOrFail($dish_id);

        $images = json_decode($dish->images, true) ?? [];
        $updateInfoArray = [];

        if ($request->hasFile('image_1')) {//Mandou a primeira imagem
            $images['image_1'] = $this->imageTreat($request->image_1, 'imagesdish/'); 
            $imagesJson = json_encode($images);

            Dish::where('id', $dish_id)->update([
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ]);
            $updateInfoArray = [
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ];
        }
        if ($request->hasFile('image_2')) {//Mandou a segunda imagem
            $images['image_2'] = $this->imageTreat($request->image_2, 'imagesdish/'); 
            $imagesJson = json_encode($images);

            Dish::where('id', $dish_id)->update([
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ]);
            $updateInfoArray = [
                'name' => $request->name,
                'images' => $imagesJson,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ];
        }

        if(!$request->hasFile('image_2') && !$request->hasFile('image_1')){ //Não mandou nenhuma imagem
            Dish::where('id', $dish_id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'type' => $request->type,
                'numMenu' => $request->numMenu,
            ]);
            $updateInfoArray = [
                'name' => $request->name,
                'description' => $request->description,
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

        return redirect('/admin/pratos')->with('sucess', 'Dados atualizados com sucesso');
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
}
