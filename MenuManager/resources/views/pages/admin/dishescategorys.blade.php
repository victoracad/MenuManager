@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
<section class=" shadow-2xl rounded-2xl flex flex-col items-center gap-5 w-full h-full">
    <div class="text-5xl font-bold">
        <h1>CATEGORIAS</h1>
    </div>
    <div class="w-full flex justify-end p-2">
        <a class="h-12 rounded-2xl flex justify-center items-center p-2 bg-green-400 text-white font-bold hover:bg-green-500" href="{{ route('createDish.page')}}">+ Adicionar um novo prato</a>
    </div>
    <div class="w-full text-4xl ">
       
        <div class="flex flex-col gap-5 p-2">
            <div class="flex gap-5">
                <a class="flex rounded-2xl overflow-hidden w-[50%] h-40 bg-[#a81c1c] text-white shadow-2xl" href="{{ route('category.page', ['cat'=>'Carne_Bovina']) }}">
                    <div class="w-[50%]">
                        <img style="display: none;" onload="this.style.display='block'" class="object-cover w-full h-full" src="/images/placeholders/bovinacat.jpg" alt="">
                    </div>
                    <div class=" w-[50%] flex flex-col justify-center p-2 items-center text-4xl font-bold">
                        <span>
                            Carne
                        </span>
                        <span>
                            Bovina
                        </span>
                    </div>
                </a>
                <a class="flex rounded-2xl overflow-hidden w-[50%] h-40 bg-[#a81c1c] text-white shadow-2xl" href="{{ route('category.page', ['cat'=>'Carne_Suina']) }}">
                    <div class="w-[50%]">
                        <img style="display: none;" onload="this.style.display='block'" class="object-cover w-full h-full" src="/images/placeholders/suinocat.jpg" alt="">
                    </div>
                    <div class=" w-[50%] flex flex-col justify-center p-2 items-center text-4xl font-bold">
                        <span>
                            Carne
                        </span>
                        <span>
                            Suína
                        </span>
                    </div>
                </a>
            </div>

            <div class="flex gap-5">
                <a class="flex rounded-2xl overflow-hidden w-[50%] h-40 bg-[#a81c1c] text-white shadow-2xl" href="{{ route('category.page', ['cat'=>'Frango']) }}">
                    <div class="w-[50%]">
                        <img style="display: none;" onload="this.style.display='block'" class="object-cover w-full h-full" src="/images/placeholders/frangocat.jpg" alt="">
                    </div>
                    <div class=" w-[50%] flex flex-col justify-center p-2 items-center font-bold">
                        <span>
                            Frango
                        </span>
                    </div>
                </a>
                <a class="flex rounded-2xl overflow-hidden w-[50%] h-40 bg-[#a81c1c] text-white shadow-2xl" href="{{ route('category.page', ['cat'=>'Pratos_Feitos']) }}">
                    <div class="w-[50%]">
                        <img style="display: none;" onload="this.style.display='block'" class="object-cover w-full h-full" src="/images/placeholders/pratofeitocat.jpg" alt="">
                    </div>
                    <div class=" w-[50%] flex flex-col justify-center p-2 items-center font-bold">
                        <span>
                            Pratos
                        </span>
                        <span>
                            Feitos
                        </span>
                    </div>
                </a>
            </div>

            <div class="flex gap-5">
                <a class="flex rounded-2xl overflow-hidden w-[50%] h-40 bg-[#a81c1c] text-white shadow-2xl" href="{{ route('category.page', ['cat'=>'Bebidas']) }}">
                    <div class="w-[50%]">
                        <img style="display: none;" onload="this.style.display='block'" class="object-cover w-full h-full" src="/images/placeholders/bebidascat.jpg" alt="">
                    </div>
                    <div class=" w-[50%] flex flex-col justify-center p-2 items-center text-4xl font-bold">
                        <span>
                            Bebidas
                        </span>
                    </div>
                </a>
                <a class="flex rounded-2xl overflow-hidden w-[50%] h-40 bg-[#a81c1c] text-white shadow-2xl" href="{{ route('category.page', ['cat'=>'Porcoes']) }}">
                    <div class="w-[50%]">
                        <img style="display: none;" onload="this.style.display='block'" class="object-cover w-full h-full" src="/images/placeholders/porcoescat.jpg" alt="">
                    </div>
                    <div class=" w-[50%] flex flex-col justify-center p-2 items-center text-4xl font-bold">
                        <span>
                            Porções
                        </span>
                    </div>
                </a>
            </div>

            <div class="flex justify-center">
                <a class="flex rounded-2xl overflow-hidden w-[60%] h-40 bg-[#a81c1c] text-white shadow-2xl" href="{{ route('category.page', ['cat'=>'Sobremesas']) }}">
                    <div class="w-[50%]">
                        <img style="display: none;" onload="this.style.display='block'" class="object-cover w-full h-full" src="/images/placeholders/sobremesascat.jpg" alt="">
                    </div>
                    <div class=" w-[50%] flex flex-col justify-center p-2 items-center text-4xl font-bold">
                        <span>
                            Sobremesas
                        </span>
                    </div>
                </a>
            </div>
           
            
        </div>
    </div>
    
</section>
   
@endsection