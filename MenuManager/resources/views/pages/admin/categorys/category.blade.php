@extends('layouts.header')
@section('title', 'Categorias')
@section('main')
 <section class="border flex flex-col p-10">
    <h1>Todos os pratos da categoria: {{$cat}}</h1>

    @foreach ($dishes as $dish)
        <div class="flex flex-col border">
            <span>nome{{$dish->name}}</span>
            <a href="{{ route('editDish.page', ['dish_id'=>$dish->id]) }}">Editar prato</a>
        </div>
    @endforeach
 </section>
    
@endsection
