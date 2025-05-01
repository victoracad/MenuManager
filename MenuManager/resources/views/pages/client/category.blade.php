@extends('layouts.client.main')
@section('title_page',  __('messages.'. $cat))
@section('icon_menu',  'arrow_back')
@section('funcBack',  'back-page')
@section('content')
@foreach ($dishes as $dish)
<a href="{{ route('dishClient.page', ['dish_id'=>$dish->id, 'locale'=>app()->getLocale()]) }}" class="flex rounded-2xl h-35 bg-neutral-50 shadow-2xl">
    <div class="flex w-full" >
        <div class=" h-full flex w-[35%] justify-center items-center relative rounded-2xl overflow-hidden">
            <img id="preview_image_2" class=" h-full flex justify-center items-center object-cover" src="/images/imagesdish/{{json_decode($dish->images, true)['image_2']}}"  alt="">
            <input accept="image/*" hidden type="file" name="image_2" id="image_2">
            <span class="absolute bottom-0 left-0 w-10 h-10 text-white font-bold bg-red-500 flex justify-center items-center">{{$dish->numMenu}}</span>
        </div>
        <div class="grid grid-rows-10 w-[65%] p-4">
            <h2 class="flex items-center font-bold row-span-8 text-[19px]">{{$dish->name}}</h2>
            
            <span class="row-span-2 text-green-700 font-bold text-2xl">{{ $formatter->formatCurrency($dish->price, 'BRL') }}</span>
        </div>   
    </div>
</a>
@endforeach
@endsection