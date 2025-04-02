@extends('layouts.header')
@section('title', 'Bem vindo a dashboard')
@section('main')
 <section class="border flex flex-col p-10">
    <h1>Adicione mais um gerente</h1>
    <form class="flex flex-col border" action="{{ route('createUser.action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nome do novo administrador</label>
        <input class="border" type="text" name="name" id="name" required>
        <label for="username">Nome De Usuário</label>
        <input class="border" type="text" name="username" id="username" required>
        <label for="username">Crie uma senha</label>
        <input class="border" type="password" name="password" id="password" required>
        <div>
            <label>
                <input type="radio" name="admin_type" value="Master" required> Master
            </label>
            <label>
                <input type="radio" name="admin_type" value="Normal" required> Normal
            </label>
        </div>
        <label for="image">Imagem do gerente</label>
        <input type="file" name="avatar_image" id="avatar_image" required>
        <input class="border cursor-pointer" type="submit" value="Criar Usuário">
    </form>
 </section>
    
@endsection
