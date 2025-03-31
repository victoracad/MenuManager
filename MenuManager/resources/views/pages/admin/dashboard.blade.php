@extends('layouts.header')
@section('title', 'Bem vindo a dashboard')
@section('main')
    <h1>Bem vindo a dashboard</h1>
    <span>usuário conectado: {{$user->username}}</span>
    <form action="{{ route('logout')}}" method="POST">
        @csrf
        <input class="border" type="submit" value="Sair">
    </form>
    @if (session('sucess'))
        <p class="sucess">{{session('sucess')}}</p>
    @endif
    <div>
        <h1>funções</h1>
        <a href="{{ route('dishes.page')}}">Pratos</a>
        <a href="">Users</a>
        <a href="">Postagens</a>
        <a href="">Anunciantes</a>
        <a href="">Status</a>
    </div>
@endsection
