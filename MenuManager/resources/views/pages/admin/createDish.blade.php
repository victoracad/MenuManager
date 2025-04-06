@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
<section class="flex flex-col p-3 shadow-2xl rounded-2xl">
    <h1 class="text-5xl flex justify-center font-bold">Crie um novo prato!</h1>
    <form class="flex flex-col gap-5" action="{{ route('createDish.action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @csrf
        <div class="flex flex-col">
            <label class="text-3xl font-bold" for="name">Nome do prato</label>
            <input placeholder="Ex: Carne ao Molho" class="border h-12 rounded-2xl p-2" type="text" name="name" id="name" required>
        </div>
        
        <div class="flex flex-col">
            <label class="text-3xl font-bold" for="">Descrição do prato</label>
            <input placeholder="Ex: Carne ao molho branco" class="border h-12 rounded-2xl p-2" type="text" name="description" id="description" required>
        </div>

        <div class="flex gap-5">
            <div class=" w-[33%]">
                <label class="text-3xl font-bold" for="price">Preço do prato</label>
                <div class="relative rounded-2xl">
                    <span class="absolute left-2 top-1/2 transform -translate-y-1/2 text-2xl">R$</span>
                    <input id="price" name="price" type="number" step="0.01" 
                    class="pl-10 border text-2xl rounded-2xl h-12 w-full  focus:outline-none focus:ring focus:ring-blue-300  appearance-none" 
                    placeholder="0.00" >
                </div>
            </div>
            
            <div class="w-[33%]">
                <label class="font-bold text-3xl" for="type">Categoria</label>
                <div>
                    <select id="type" name="type" class="border rounded-2xl h-12 w-full text-2xl ">
                        <option value="Carne_Bovina">Carne Bovina</option>
                        <option value="Carne_Suina">Carne Suína</option>
                        <option value="Frango">Frango</option>
                        <option value="Bebidas">Bebidas</option>
                        <option value="Pratos_Feitos">Pratos Feitos</option>
                        <option value="Porcoes">Porções</option>
                    </select>
                </div>
            </div>

            <div class="w-[33%]">
                <label class="text-3xl font-bold" for="">Num. Cardápio</label>
                <input placeholder="0" class="border h-12 w-full rounded-2xl p-3 text-2xl" type="number" name="numMenu" id="numMenu" " required>
            </div>
        </div>
        
        <div class="w-full p-2 rounded-2xl bg-gray-200 flex gap-2">
            <div class="w-[50%] max-h-100 relative rounded-2xl overflow-hidden">
                <img id="preview_image_1" class="w-full h-full object-cover" src="/images/placeholders/placeholder_image.png" alt="">
                <label class="absolute top-0 cursor-pointer" for="image_1"><i class="material-icons text-blue-400" style="font-size: 45px">edit_square</i></label>
                <input accept="image/*" hidden type="file" name="image_1" id="image_1">
            </div>
            <div class="w-[50%] max-h-100 relative rounded-2xl overflow-hidden">
                <img id="preview_image_2" class="w-full h-full object-cover" src="/images/placeholders/placeholder_image.png"  alt="">
                <label class="absolute top-0 cursor-pointer" for="image_2"><i class="material-icons text-blue-400" style="font-size: 45px">edit_square</i> </label>
                <input accept="image/*" hidden type="file" name="image_2" id="image_2">
            </div>
        </div>
        <div class="flex text-2xl font-bold">
            <span class="w-[50%] flex items-center justify-center">
                Imagem de ilustração
            </span>
            <span class="w-[50%] flex items-center justify-center"> 
                Imagem de descrição
            </span>
        </div>
        <div class="flex justify-center">
            <input class="bg-green-400 w-[50%] h-12 text-white font-bold text-2xl rounded-2xl hover:bg-green-500 cursor-pointer" type="submit" value="Criar Prato">
        </div>
    </form>
</section>
    
@endsection
