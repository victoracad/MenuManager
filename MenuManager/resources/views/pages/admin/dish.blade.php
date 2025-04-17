@extends('layouts.main')
@section('title', 'Editar prato')
@section('content')
<section class="shadow-2xl p-2 flex flex-col">
    <div class="flex justify-center text-4xl font-bold">
        <h1>VISUALIZE O SEU PRATO</h1>
    </div>
    
    <div class="flex flex-col pl-10 pr-10">
        <div class="bg-gray-300 rounded-2xl flex items-center justify-center p-2">
            <img src="/images/imagesdish/{{json_decode($dish->images, true)['image_1']}}" alt="" class=" h-100 shadow-2xl rounded-3xl">
        </div>
        <div class="flex flex-col gap-3 p-2">
            <span class="text-4xl font-bold">{{$dish->name}}</span>
            <span class="text-3xl">{{json_decode($dish->description, true)['desc_in'];}}</span>
            <div class="flex justify-between text-4xl font-bold">
                <span class="text-green-800">{{ $formatter->formatCurrency($dish->price, 'BRL') }}</span>
                <span class="">servem:<i class="material-icons " style="font-size: 30px">man</i><i class="material-icons " style="font-size: 30px">man</i><i class="material-icons " style="font-size: 30px">man</i>    </span>
                <span class="text-orange-400 font-bold">Número: {{$dish->numMenu}}</span>
            </div>
            
        </div>
        <div class="flex justify-center">
            <a class="h-12 bg-blue-300 flex items-center justify-center rounded-2xl w-[50%] text-white font-bold text-2xl hover:bg-blue-500" href="{{ route('editDish.page', ['dish_id'=>$dish->id, 'locale' => 'pt']) }}">Editar prato</a>
        </div>
        
    </div>
</section>
   
@endsection