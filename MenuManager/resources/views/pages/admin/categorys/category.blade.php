@extends('layouts.header')
@section('title', 'Categorias')
@section('main')
 <section class="border flex flex-col p-10">
    <h1>Todos os pratos da categoria: {{$cat}}</h1>

    @foreach ($dishes as $dish)
        <a href="{{ route('dish.page', ['dish_id' => $dish->id]) }}">
            <div class="flex flex-col border">
                @foreach (json_decode($dish->images, true) as $image)
                    <img src="/images/imagesdish/{{$image}}" alt="" class="w-40 h-40">
                @endforeach
                <span>nome{{$dish->name}}</span>
                <span>Descrição{{$dish->description}}</span>
                <span>preço{{$dish->price}}</span>
                <span>Numero do prato{{$dish->numMenu}}</span>
                <a href="{{ route('editDish.page', ['dish_id'=>$dish->id]) }}">Editar prato</a>
            </div>
        </a>
    @endforeach
 </section>
    
@endsection
