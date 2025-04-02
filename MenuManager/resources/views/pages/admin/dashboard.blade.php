@extends('layouts.header')
@section('title', 'Bem vindo a dashboard')
@section('main')
 <section class="border flex flex-col p-10">
    <h1>Bem vindo a dashboard</h1>
    <span>usuário conectado: {{$user->username}}</span>
    <form action="{{ route('logout')}}" method="POST">
        @csrf
        <input class="border cursor-pointer w-full" type="submit" value="Sair">
    </form>
    @if (session('sucess'))
        <p class="sucess">{{session('sucess')}}</p>
    @endif
    <div>
        <h1>funções</h1>
        <div class="flex flex-col text-blue-500">
            <a class="border" href="{{ route('dishes.page')}}">Pratos</a>
            <a class="border" href="{{ route('users.page')}}">Users</a>
            <a class="border" href="">Postagens</a>
            <a class="border" href="">Anunciantes</a>
            <a class="border" href="{{ route('status.page')}}">Status</a>
        </div>
    </div>
 </section>
    
@endsection
