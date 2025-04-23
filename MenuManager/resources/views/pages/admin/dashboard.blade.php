@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
 <section class="border h-full grid grid-row-10 p-5">
    <div class="row-span-8 grid grid-cols-10">
        <div class="border col-span-5">
            <h1>Visualização do site</h1>
        </div>
        <div class="border col-span-5">
            <h1>Prato mais visto</h1>
        </div>
    </div>
    <div class=" row-span-2 flex flex-col justify-center items-center ">
        <div class="flex w-full justify-between">
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
            
            
        </div>
    </div>
 </section>
    
@endsection
