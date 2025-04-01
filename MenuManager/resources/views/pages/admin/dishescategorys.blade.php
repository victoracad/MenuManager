@extends('layouts.header')
@section('title', 'Editar pratos')
@section('main')
<section class="border flex flex-col">
    <h1>Escolha uma categoria dos pratos</h1>
    <a class="border" href="{{ route('createDish.page')}}">Adicionar um novo prato</a>
    <div class="flex flex-col">
        <a href="{{ route('category.page', ['cat'=>'Carne_Bovina']) }}">
            <span>Carne Bovina</span>
        </a>
        <a href="{{ route('category.page', ['cat'=>'Carne_Suina']) }}">
            <span>Carne Suina</span>
        </a>
        
        <span>Cat 2</span>
        <span>Cat 3</span>
        <span>Cat 4</span>
    </div>
</section>
   
@endsection