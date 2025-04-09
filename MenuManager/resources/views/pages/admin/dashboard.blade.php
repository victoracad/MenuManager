@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
 <section class="border flex flex-col p-10">
    <h1>{{ __('messages.welcome') }}</h1>
    <p>Idioma atual: {{ app()->getLocale() }}</p>
    <span>usuário conectado: {{$userauth->username}}</span>
    
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
