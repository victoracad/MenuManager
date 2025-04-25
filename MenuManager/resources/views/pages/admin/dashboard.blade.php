@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
 <section class="h-full grid grid-row-10 p-5">
    <div class="row-span-8 grid grid-cols-10">
        <div class="col-span-5 grid grid-row-10">
            <h1 class="col-row-2 text-4xl font-bold text-center flex items-center justify-center">Visualização do site no mês</h1>
            <div class="flex items-center justify-center gap-3 text-5xl row-span-8">
                <i class="material-icons " style="font-size: 70px">visibility</i> 
                <span>{{$siteViews->views}}</span>
            </div>
        </div>
        <div class="col-span-5 p-5">
            <h1 class="text-center text-3xl font-bold">Prato mais visto do mês</h1>
            <div class="bg-white shadow-2xl rounded-2xl p-2 ">
                <h2 class="text-center text-2xl font-bold">{{$DishViews->dish->name}}</h2>
            
                <div class="grid grid-cols-10">
                    <div class="relative rounded-2xl overflow-hidden col-span-8 ">
                        <img src="/images/imagesdish/{{json_decode($DishViews->dish->images, true)['image_1']}}" alt="">
                        <div class="absolute bg-red-500 bottom-0 w-14 h-13 text-2xl font-bold flex items-center justify-center">
                            {{$DishViews->dish->numMenu}}
                        </div>
                    </div>

                    <div class="flex flex-col justify-center items-center gap-2 text-2xl col-span-2">
                        <i class="material-icons " style="font-size: 40px">visibility</i> 
                        <span>{{$DishViews->views}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" row-span-2 flex flex-col justify-center items-center ">
        <div class="flex flex-col w-full items-center gap-5">
            <div class="flex gap-5">
                <a class="relative text-black bg-[#D32F2F] shadow w-40 h-40 rounded-2xl cursor-pointer flex justify-center items-center hover:w-45 hover:h-45 transition-all duration-300 ease-in-out" href="{{ route('dishes.page', ['locale' => 'pt'])}}">
                    <i class="material-icons" style="font-size: 150px">menu_book</i> 
                    <span class="absolute font-bold text-white  bottom-2 text-sm rounded-2xl p-2 bg-gray-400/40">
                        Editar Cardápio
                    </span>
                </a>
                <a class="relative text-black bg-[#D32F2F] shadow w-40 h-40 rounded-2xl cursor-pointer flex justify-center items-center hover:w-45 hover:h-45 transition-all duration-300 ease-in-out" href="{{ route('users.page', ['locale' => 'pt'])}}">
                    <i class="material-icons" style="font-size: 150px">group</i> 
                    <span class="absolute font-bold text-white  bottom-2 text-sm rounded-2xl p-2 bg-gray-400/40">
                        Gerentes
                    </span>
                </a>

                <a class="relative text-black bg-[#D32F2F] shadow w-40 h-40 rounded-2xl cursor-pointer flex justify-center items-center hover:w-45 hover:h-45 transition-all duration-300 ease-in-out" href="{{ route('status.page', ['locale' => 'pt'])}}">
                    <i class="material-icons" style="font-size: 150px">post_add</i> 
                    <span class="absolute font-bold text-white  bottom-2 text-sm rounded-2xl p-2 bg-gray-400/40">
                        Postagens
                    </span>
                </a>
            </div>
            <div class="flex gap-5">

                <a class="relative text-black bg-[#D32F2F] shadow w-40 h-40 rounded-2xl cursor-pointer flex justify-center items-center hover:w-45 hover:h-45 transition-all duration-300 ease-in-out" href="{{ route('status.page', ['locale' => 'pt'])}}">
                    <i class="material-icons" style="font-size: 150px">trending_up</i> 
                    <span class="absolute font-bold text-white bottom-2 text-sm rounded-2xl p-2 bg-gray-400/40">
                        Status do cardápio
                    </span>
                </a>

                <a class="relative text-black bg-[#D32F2F] shadow w-40 h-40 rounded-2xl cursor-pointer flex justify-center items-center hover:w-45 hover:h-45 transition-all duration-300 ease-in-out" href="{{ route('status.page', ['locale' => 'pt'])}}">
                    <i class="material-icons" style="font-size: 150px">sort</i> 
                    <span class="absolute font-bold text-white  bottom-2 text-sm rounded-2xl p-2 bg-gray-400/40">
                        Logs
                    </span>
                </a>

                <a class="relative text-black bg-[#D32F2F] shadow w-40 h-40 rounded-2xl cursor-pointer flex justify-center items-center hover:w-45 hover:h-45 transition-all duration-300 ease-in-out" href="{{ route('status.page', ['locale' => 'pt'])}}">
                    <i class="material-icons" style="font-size: 150px">person</i> 
                    <span class="absolute font-bold text-white  bottom-2 text-sm rounded-2xl p-2 bg-gray-400/40">
                        Sobre
                    </span>
                </a>

            </div>
            
        </div>
    </div>
 </section>
    
@endsection
