@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
 <section class=" h-[80%] rounded-2xl shadow-2xl flex flex-col p-5">
    <div class=" flex justify-center items-center text-4xl font-bold">
        <h1>Adicione mais um gerente</h1>
    </div>
    <div class="flex h-full items-center justify-center">
        <form class="flex flex-col w-[70%] text-2xl gap-4 " action="{{ route('createUser.action', ['locale' => 'pt']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="">Nome</label>
                <input class="border rounded-3xl h-12 p-2" type="text" name="name" id="name" required>
            </div>
            <div class="flex flex-col">
                <label for="username">Nome De Usuário</label>
                <input class="border rounded-3xl h-12 p-2" type="text" name="username" id="username" required>
            </div>
            <div class="flex flex-col">
                <label for="username">Crie uma senha</label>
                <input class="border rounded-3xl h-12 p-2" type="password" name="password" id="password" required>
            </div>

            <div>
                <label>
                    <input type="radio" name="admin_type" value="Master" required> Master
                </label>
                <label>
                    <input type="radio" name="admin_type" value="Normal" required> Normal
                </label>
            </div>
            
            
            <div class="flex justify-end items-center gap-5">
                <label class="cursor-pointer" for="avatar_image"><i class="material-icons" style="font-size: 30px">add_photo_alternate</i></label>
                <input hidden type="file" name="avatar_image" id="avatar_image" required>
                <div class="shadow w-40 h-40 rounded-2xl overflow-hidden flex">
                    <img class="object-cover w-full h-full " src="/images/placeholders/avatar_placeholder.png" alt="">
                </div>
            </div>
            <div class="flex justify-center items-center">
                <input class="cursor-pointer h-12 rounded-3xl text-white font-bold bg-green-400 w-[50%]" type="submit" value="Criar Usuário">
            </div>
            
        </form>
    </div>
    
 </section>
    
@endsection
