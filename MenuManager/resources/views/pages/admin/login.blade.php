@extends('layouts.header')
@section('title', 'Faça login')
@section('main')
    <h1>Faça login com sua conta admin</h1>
    <form action="{{ route('login.action') }}" method="POST">
        @csrf
        <label for="username">Usuário</label>
        <input class="border" type="text" id="username" name="username" placeholder="Usuário">
        <label for="password">Senha</label>
        <input class="border" type="password" id="password" name="password" placeholder="Senha">
        <input type="submit" value="Login">
    </form>

    @if (session('error'))
    <p class="text-red-500">{{session('error')}}</p>
    @endif
@endsection

