@extends('layouts.main')
@section('title', 'Sobre')
@section('content')
    <h1 class="text-center text-5xl font-bold">Personalize o sobre do seu cardápio</h1>
    <div class="w-full h-auto border flex justify-center items-center pt-3 pb-3 ">
        <form class="flex flex-col w-[50%] h-full border bg-white rounded-2xl p-3 gap-3"  action="">
            @csrf
            <h2 class="text-4xl text-center font-bold">Conheça o nosso restaurante</h2>

            <div class="relative bg-gray-300 rounded-2xl flex items-center justify-center p-2">
                <label class="absolute top-auto left-auto cursor-pointer" for="image_1"><i class="material-icons text-black" style="font-size: 45px">edit_square</i></label>
                <img id="preview_image_1" src="/images/placeholders/placeholder_image.png" alt="" class=" w-full shadow-2xl rounded-3xl">
                <input hidden type="file" name="image" id="image_1" required>
            </div>
            <div>
                <div class="flex flex-col text-3xl p-3">
                    <textarea maxlength="150" placeholder="Ex: Nós somos um restaurante caseiro!" class="border flex justify-center border-none focus:outline-none h-42 rounded-2xl p-2" name="description" id="description" required></textarea>
                </div>
            </div>
            <h2 class="text-4xl font-bold">Informações para Contato</h2>

            <div class="">
                <input class="w-full p-3 text-2xl border rounded-2xl" placeholder="EX: https://www.facebook.com/pages/seurestaurante"  type="text" name="url_facebook" id="inputUrl">
            </div>
            <div class="">
                <input class="w-full p-3 text-2xl border rounded-2xl" placeholder="EX: https://www.instagram.com/seurestaurante" type="text" name="url_instagram" id="inputUrlInstagram">
            </div>
            <div class="">
                <input class="w-full p-3 text-2xl border rounded-2xl" type="text" name="telefone" id="inputTelefone">
            </div>
        </form>
    </div>
    
@endsection
