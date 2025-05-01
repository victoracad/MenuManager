@extends('layouts.header')
@section('title', 'Faça login')
@section('main')
   
    <form class="flex flex-col gap-3 bg-white shadow-2xl rounded-2xl p-5 text-2xl" action="{{ route('login.action', ['locale' => 'pt']) }}" method="POST">
        @csrf
        <h1>Faça login com sua conta de gerente</h1>
        <div class="flex flex-col">
            <label for="username">Usuário</label>
            <input class="border border-gray-400  rounded-2xl p-2" type="text" id="username" name="username" placeholder="Usuário" required>
        </div>
        @error('username')
            <div class="text-red-500 text-sm">
                {{ $message }}
            </div>
        @enderror
        <div class="flex flex-col">
            <label for="password">Senha</label>
            <input class="border border-gray-400 rounded-2xl p-2" type="password" id="password" name="password" placeholder="Senha" required>
        </div>
        @error('password')
            <div class="text-red-500 text-sm">
                {{ $message }}
            </div>
        @enderror
        <div class="flex items-center justify-center">
            <input class="p-2 rounded-2xl w-[40%] cursor-pointer bg-green-400 hover:bg-green-500 text-white font-bold" type="submit" value="Login">
        </div>
        
        @if (session('error'))
            <p class="text-red-500">{{session('error')}}</p>
        @endif
    </form>


@endsection

