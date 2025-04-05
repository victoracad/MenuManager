@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
 <section class="rounded-2xl shadow-2xl flex flex-col p-2 w-full h-full items-center">
    <div class="text-4xl font-bold">
        <h1>
            GERENCIADOR DE ADMINISTRADORES
        </h1>
    </div>
    <div class="w-full flex justify-end">
        <a class="bg-green-400 hover:bg-green-500 rounded-full font-bold text-white h-10 p-6 flex items-center justify-center" href="{{ route('createuser.page') }}"> <i class="material-icons mr-2" style="font-size: 30px">person_add</i>Adicionar um novo gerente</a>
    </div>
    
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
                <span class="flex justify-center items-center col-span-3">{{$user->username}} {{$user->id}}</span>
                <div class="flex justify-center items-center col-span-2">
                    <img class="flex justify-center items-center col-span-2 w-15 rounded-full" src="/images/imagesusers/{{$user->profile->avatar_image}}" alt="">
                </div>
                
                <span class="flex justify-center items-center col-span-2">{{$user->admin_type}}</span>
                <form class="flex justify-center items-center col-span-2 " action="{{ route('deleteUser.action', ['user_id'=>$user->id]) }}" method="POST">
                    @csrf
                    <label for="deleteUser{{$user->id}}"> <i class="material-icons text-red-500 cursor-pointer" style="font-size: 30px">delete</i> </label>
                    <input hidden id="deleteUser{{$user->id}}" class="border cursor-pointer" type="submit" value="">
                </form>
            </div>
        @endforeach
    </div>
    

    
 </section>
    
@endsection
