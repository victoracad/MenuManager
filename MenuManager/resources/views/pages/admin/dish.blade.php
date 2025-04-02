@extends('layouts.header')
@section('title', 'Editar prato')
@section('main')
<section class="border flex flex-col">
    <h1>Aqui você visualiza o seu prato</h1>
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
</section>
   
@endsection