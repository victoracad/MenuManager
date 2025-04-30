@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
 <section class="rounded-2xl shadow-2xl flex flex-col p-2 w-full h-full items-center">
    <div class="text-4xl font-bold">
        <h1>
            GERENCIADOR DE ADMINISTRADORES
        </h1>
    </div>
    @if ($userauth->admin_type == 'Master')
        <div class="w-full flex justify-end">
            <a class="bg-green-400 hover:bg-green-500 rounded-full font-bold text-white h-10 p-6 flex items-center justify-center" href="{{ route('createuser.page', ['locale'=>'pt']) }}"> <i class="material-icons mr-2" style="font-size: 30px">person_add</i>Adicionar um novo gerente</a>
        </div>
    @endif
    
    <div class="flex flex-col w-full p-2 gap-2 text-[20px]">
        <div class="border-b border-black grid grid-cols-12">
            <span class="flex justify-center items-center col-span-3">Nome</span>
            <span class="flex justify-center items-center col-span-3">Username</span>
            <span class="flex justify-center items-center col-span-2">Foto</span>
            <span class="flex justify-center items-center col-span-2">Tipo</span>
            <span class="flex justify-center items-center col-span-2">Ações</span>
        </div>
        @foreach ($users as $user)
            <div class="grid grid-cols-12 ">
                <span class="flex justify-center items-center col-span-3">{{$user->profile->name}}</span>
                <span class="flex justify-center items-center col-span-3">{{$user->username}}</span>
                <div class="flex justify-center items-center col-span-2 overflow-hidden">
                    <div class="rounded-full w-15 h-15 overflow-hidden">
                        <img class="flex w-full h-full object-cover" src="/images/imagesusers/{{$user->profile->avatar_image}}" alt="">
                    </div>
                </div>
                
                <span class="flex justify-center items-center col-span-2">{{$user->admin_type}}</span>
                <div class="flex justify-center items-center col-span-2">
                    <button data-id="{{$user->id}}" class="openModalConfirm rounded-full w-10 h-10 flex justify-center items-center bg-red-600 text-white hover:bg-red-700"><i class="material-icons text-white cursor-pointer" style="font-size: 30px">delete</i></button>
                </div>
                
            </div>
        @endforeach
    </div>
 </section>  
@endsection
