@extends('layouts.client.main')
@section('title_page',  $dish->name)
@section('icon_menu',  'arrow_back')
@section('funcBack',  'backPage()')
@section('content')
<div class="w-full bg-gray-100 p-2 rounded-2xl">
    <div class="flex flex-col gap-2">
        
        <span class="text-3xl font-bold">{{$dish->name}}</span>
        
        <div class="flex mb-10 justify-center items-center w-full rounded-2xl overflow-hidden">
            <img class=" w-full flex justify-center items-center " src="/images/imagesdish/{{json_decode($dish->images, true)['image_1']}}"  alt="">
        </div>
        <span class="text-2xl text-center text-red-500 font-bold">{{json_decode($dish->description, true)['desc_'. app()->getLocale()]}}</span>
        <span class="text-4xl font-bold text-green-600">{{ $formatter->formatCurrency($dish->price, 'BRL') }}
        </span>
        
    </div>
    
</div>
    
@endsection