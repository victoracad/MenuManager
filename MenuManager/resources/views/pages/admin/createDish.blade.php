@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
<section class="flex flex-col p-3 shadow-2xl rounded-2xl">
    <h1 class="text-5xl flex justify-center font-bold">Crie um novo prato!</h1>
    <form class="flex flex-col gap-5" action="{{ route('createDish.action', ['locale' => 'pt']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-center items-center text-4xl">
            <h2>Página do prato</h2>
        </div>
        
        <div>
            <div>
                <div class="flex flex-col text-4xl font-bold">
                    <input placeholder="Ex: Carne ao Molho" class="border-none focus:outline-none h-18 rounded-2xl p-2" type="text" name="name" id="name" required>
                </div>
            </div>

            <div>
                <div class="relative bg-gray-300 rounded-2xl flex items-center justify-center p-2">
                    <label class="absolute top-auto left-auto cursor-pointer" for="image_1"><i class="material-icons text-black" style="font-size: 45px">edit_square</i></label>
                    <img id="preview_image_1" src="/images/placeholders/placeholder_image.png" alt="" class=" h-100 shadow-2xl rounded-3xl">
                    <input accept="image/*" hidden type="file" name="image_1" id="image_1" required>
                </div>
            </div>

            <div>
                <div class="flex flex-col text-3xl p-3">
                    <textarea maxlength="150" placeholder="Ex: Carne bovina cozida com molho caseiro de tomate, cebola e temperos selecionados." class="border flex justify-center border-none focus:outline-none h-42 rounded-2xl p-2" name="description" id="description" required></textarea>
                </div>
            </div>

            <div>
                <div class="flex gap-5">
                    <div class=" w-[45%]">
                        <div class="relative rounded-2xl text-5xl">
                            <span class="absolute left-2 top-1/2 transform -translate-y-1/2 text-green-400 font-bold ">R$</span>
                            <input id="priceInput" max="1000" id="price" name="price" type="text" inputmode="numeric"
                            class="price pl-20 rounded-2xl h-12 w-full text-green-400 font-bold border-none focus:outline-none focus:appearance-none" 
                            placeholder="0,00" required>
                        </div>
                    </div>
                    
                    <div class="w-[28%]">
                        
                    </div>
        
                    <div class="w-[27%] flex text-red-500">
                        <label  class="font-bold text-5xl" for="numMenu">№</label>
                        <input placeholder="0" class="border text-5xl h-12 w-full border-none focus:outline-none font-bold rounded-2xl p-3" type="text" inputmode="numeric" maxlength="5" pattern="\d*" name="numMenu" id="numMenu" required>
                    </div>
                </div>
            </div>

            <div>
                <label class="font-bold text-3xl" for="type">Categoria</label>
                        <div>
                            <select id="type" name="type" class="border rounded-2xl h-12 w-full text-2xl ">
                                <option value="Carne_Bovina">Carne Bovina</option>
                                <option value="Carne_Suina">Carne Suína</option>
                                <option value="Frango">Frango</option>
                                <option value="Peixe">Peixe</option>
                                <option value="Bebidas">Bebidas</option>
                                <option value="Pratos_Feitos">Pratos Feitos</option>
                                <option value="Porcoes">Porções</option>
                            </select>
                        </div>
            </div>
        </div>
        <hr>
        
       
        
        <!--PREVIEW CARADÁPIO--->
        <div>
            <div class="flex rounded-2xl h-60 bg-neutral-50 shadow-2xl">
                
                    <div class="relative w-[30%] h-60 rounded-l-2xl overflow-hidden ">
                        <div class="h-full flex justify-center items-center relative rounded-2xl overflow-hidden">
                            <img id="preview_image_2" class=" h-full flex justify-center items-center object-cover" src="/images/placeholders/placeholder_image.png"  alt="">
                            <label class="absolute top-0 left-0 cursor-pointer" for="image_2"><i class="material-icons text-black" style="font-size: 45px">edit_square</i> </label>
                            <input accept="image/*" hidden type="file" name="image_2" id="image_2" required>
                            <span class="absolute bottom-0 left-0 w-10 h-10 text-white font-bold bg-red-500 flex justify-center items-center">200</span>
                        </div>
                        <img hidden src="/images/placeholders/placeholder_image.png" alt="" class="object-cover w-full h-full">
                        
                    </div>
                    <div class="grid grid-rows-10 w-[70%] p-4">
                        <h2 class="flex items-center font-bold row-span-3 text-3xl">Cerveja Tijuca</h2>
                        <span class="row-span-5">Cerveja Tijuca, bem gelada.</span>
                        <span class="row-span-2 text-green-700 font-bold text-2xl">R$12,99</span>
                    </div>   
                
            </div>
        </div>

        <div class="flex justify-center">
            <input class="bg-green-400 w-[50%] h-12 text-white font-bold text-2xl rounded-2xl hover:bg-green-500 cursor-pointer" type="submit" value="Criar Prato">
        </div>
    </form>
</section>
<script>
    Inputmask("99,99").mask("#priceInput");
</script>
    
@endsection
