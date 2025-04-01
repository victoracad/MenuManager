<?php

namespace App\Http\Controllers;

use App\Models\Dish;
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
        if ($request->hasFile('image')) { 
            $i = 1;
            $imagesArray = [];
            //$jsonString = json_encode([]);
            foreach ($request->file('image') as $image) {
                $imagesArray['image_' . $i] = $this->imageTreat($image, 'imagesdish/');
                $i++;
            }        
        }
        $imagesJson = json_encode($imagesArray);   
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
        $updateInfo = json_encode($updateInfoArray);  
        Systemevent::create([
            'typechange' => 'create', 
            'tablechange' => 'dishes',
            'update_info' => $updateInfo,
            'users_id' => Auth::id(),
        ]);

        return redirect(route('createDish.page'))->with('sucess', 'Prato Criado com sucesso');
    }
    public function updateDish(Request $request, $dish_id){

        $updateInfoArray = [];
        if ($request->hasFile('image')) { 
            $i = 1;
            $imagesArray = [];
            //$jsonString = json_encode([]);
            foreach ($request->file('image') as $image) {
                $imagesArray['image_' . $i] = $this->imageTreat($image, 'imagesdish/');
                $i++;
            }        
            $imagesJson = json_encode($imagesArray);   
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
        }else{
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
}
