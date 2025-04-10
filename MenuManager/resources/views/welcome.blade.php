@extends('layouts.header')
@section('title', 'Bem vindo ao Gerenciador')
@section('main')
    <h1>olá</h1>
    <a href="{{ route('login', ['locale'=>'pt']) }}">Fazer login</a>
@endsection