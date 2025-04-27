@extends('layouts.main')
@section('title', 'Sobre')
@section('content')
    @if ($about == null)
        <h1 class="text-center text-5xl font-bold">Personalize o sobre do seu cardápio</h1>
        <div class="w-full h-auto flex justify-center items-center pt-3 pb-3 ">
            <form class="flex flex-col w-[50%] h-full shadow-2xl bg-white rounded-2xl p-3 gap-3"  action="{{ route('updateAbout.action', ['locale'=>'pt']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-4xl text-center font-bold">Conheça o nosso restaurante</h2>

                <div class="relative bg-gray-300 rounded-2xl flex items-center justify-center p-2">
                    <label class="absolute top-auto left-auto cursor-pointer" for="image_1"><i class="material-icons text-black" style="font-size: 45px">edit_square</i></label>
                    <img id="preview_image_1" src="/images/placeholders/placeholder_image.png" alt="" class=" w-full shadow-2xl rounded-3xl">
                    <input required hidden type="file" name="image" id="image_1" required>
                </div>
                <div>
                    <div class="flex flex-col text-3xl p-3">
                        <textarea required maxlength="150" placeholder="Ex: Nós somos um restaurante caseiro!" class="border flex justify-center border-none focus:outline-none h-42 rounded-2xl p-2" name="description" id="description" required></textarea>
                    </div>
                </div>
                <h2 class="text-4xl font-bold">Informações para Contato</h2>

                <div class="flex items-center gap-2">
                    <i class="fab fa-facebook-f text-3xl"></i>
                    <input required class="w-full p-3 text-2xl border rounded-2xl" placeholder="EX: https://www.facebook.com/pages/seurestaurante"  type="text" name="url_facebook" id="inputUrl">
                </div>
                <div class="flex items-center gap-2">
                    <i class="fab fa-instagram text-3xl"></i>
                    <input required class="w-full p-3 text-2xl border rounded-2xl" placeholder="EX: https://www.instagram.com/seurestaurante" type="text" name="url_instagram" id="inputUrlInstagram">
                </div>
                <div class="flex items-center gap-2">
                    <i class="fab fa-whatsapp text-3xl"></i>
                    <input required class="w-full p-3 text-2xl border rounded-2xl phone" placeholder="(99)9999-9999" type="text" name="telefone" id="inputTelefone">
                </div>

                <h2 class="text-3xl font-bold">Veja a nosso localização</h2>
                
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-3xl"></i>
                    <input required class="w-full p-3 text-2xl border rounded-2xl" placeholder="Latitude" step="any" type="number" name="latitude" id="latitude">
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-3xl"></i>
                    <input required class="w-full p-3 text-2xl border rounded-2xl" placeholder="Longitude" step="any" type="number" name="longitude" id="longitude">
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-3xl"></i>
                    <input required class="w-full p-3 text-2xl border rounded-2xl" placeholder="Ex: Avenida palmares"  type="text" name="address" id="address">
                </div>
                <div class="flex justify-center">
                    <input class="w-[50%] p-3 rounded-2xl cursor-pointer bg-green-400 hover:bg-green-500" type="submit" value="Atualizar Informações">
                </div>
            </form>
        </div>
    @else
        <h1 class="text-center text-5xl font-bold">Personalize o sobre do seu cardápio</h1>
        <div class="w-full h-auto flex justify-center items-center pt-3 pb-3 ">
            <form class="flex flex-col w-[50%] h-full shadow-2xl bg-white rounded-2xl p-3 gap-3"  action="{{ route('updateAbout.action', ['locale'=>'pt']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-4xl text-center font-bold">Conheça o nosso restaurante</h2>

                <div class="relative bg-gray-300 rounded-2xl flex items-center justify-center p-2">
                    <label class="absolute top-auto left-auto cursor-pointer" for="image_1"><i class="material-icons text-black" style="font-size: 45px">edit_square</i></label>
                    <img id="preview_image_1" src="/images/imagesAbout/{{$about->image}}" alt="" class=" w-full shadow-2xl rounded-3xl">
                    <input hidden type="file" name="image" id="image_1">
                </div>
                <div>
                    <div class="flex flex-col text-3xl p-3">
                        <textarea required maxlength="150" placeholder="Ex: Nós somos um restaurante caseiro!" class="border flex justify-center border-none focus:outline-none h-42 rounded-2xl p-2" name="description" id="description" required>{{$about->description}}</textarea>
                    </div>
                </div>
                <h2 class="text-4xl font-bold">Informações para Contato</h2>

                <div class="flex items-center gap-2">
                    <i class="fab fa-facebook-f text-3xl"></i>
                    <input value="{{$about->url_facebook}}" required class="w-full p-3 text-2xl border rounded-2xl" placeholder="EX: https://www.facebook.com/pages/seurestaurante"  type="text" name="url_facebook" id="inputUrl">
                </div>
                <div class="flex items-center gap-2">
                    <i class="fab fa-instagram text-3xl"></i>
                    <input value="{{$about->url_instagram}}" required class="w-full p-3 text-2xl border rounded-2xl" placeholder="EX: https://www.instagram.com/seurestaurante" type="text" name="url_instagram" id="inputUrlInstagram">
                </div>
                <div class="flex items-center gap-2">
                    <i class="fab fa-whatsapp text-3xl"></i>
                    <input value="{{$about->telefone}}" required class="w-full p-3 text-2xl border rounded-2xl phone" placeholder="(99)9999-9999" type="text" name="telefone" id="inputTelefone">
                </div>

                <h2 class="text-3xl font-bold">Veja a nosso localização</h2>
                
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-3xl"></i>
                    <input value="{{json_decode($about->localizations, true)['latitude']}}" required class="w-full p-3 text-2xl border rounded-2xl" placeholder="Latitude" step="any" type="number" name="latitude" id="latitude">
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-3xl"></i>
                    <input value="{{json_decode($about->localizations, true)['longitude']}}" required class="w-full p-3 text-2xl border rounded-2xl" placeholder="Longitude" step="any" type="number" name="longitude" id="longitude">
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-3xl"></i>
                    <input value="{{json_decode($about->localizations, true)['address']}}" required class="w-full p-3 text-2xl border rounded-2xl" placeholder="Ex: Avenida palmares"  type="text" name="address" id="address">
                </div>
                <div class="flex justify-center">
                    <input class="w-[50%] p-3 rounded-2xl cursor-pointer bg-green-400 hover:bg-green-500" type="submit" value="Atualizar Informações">
                </div>
            </form>
        </div>
    
    @endif
    
@endsection
