@extends('layouts.header')
@section('title', 'Bem vindo a dashboard')
@section('main')
 <section class="border flex flex-col p-10">
    @if (session('sucess'))
        <p>{{session('sucess')}}</p>
    @endif
    @if (session('error'))
        <p>{{session('error')}}</p>
    @endif
    <h1>Todos os gerentes</h1>
    @foreach ($users as $user)
        <div class="flex border gap-2">
            <span>Nome{{$user->username}}|</span>
            <span>Tipo de gerente{{$user->admin_type}}|</span>
        </div>
        <form action="{{ route('deleteUser.action', ['user_id'=>$user->id]) }}" method="POST">
            @csrf
            <input class="border cursor-pointer" type="submit" value="Excluir usuário">
        </form>

    @endforeach

    <a href="{{ route('createuser.page') }}">Adicionar um gerente</a>
 </section>
    
@endsection
