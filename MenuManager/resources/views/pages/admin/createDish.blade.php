@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
<section>
    <h1 class="text-5xl">Crie um novo prato!</h1>
    <form class="flex flex-col border-2 border-blue-500" action="{{ route('createDish.action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="">Nome do prato</label>
        <input class="border" type="text" name="name" id="name" required>
        <label for="">Descrição do prato</label>
        <input class="border" type="text" name="description" id="description" required>
        <label for="">Preço do prato</label>
        <input class="border" type="number" name="price" id="price" required>
        <label for="">Selecione a Categoria</label>
        <div>
            <label>
                <input type="radio" name="type" value="Carne_Bovina"> Carnes
            </label>
            <label>
                <input type="radio" name="type" value="Carne_Suina"> Carnes
            </label>
            <label>
                <input type="radio" name="type" value="Frango"> Frango
            </label>
            <label>
                <input type="radio" name="type" value="Bebidas"> Bebidas
            </label>
        </div>
        <label for="">Número do menu</label>
        <input class="border" type="numMenu" name="price" id="price" required>
        <label for="file">Imagens do prato</label>
        <input class="border" multiple accept="image/*" type="file" name="image[]" id="image" required>
        <input type="submit" value="Criar prato">
    </form>
</section>
    
@endsection
