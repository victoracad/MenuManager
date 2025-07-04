@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
 <section class="flex flex-col gap-5 shadow-2xl rounded-2xl p-5 ">
    <h1 class="text-5xl font-bold flex justify-center">{{__('messages.'. $cat)}}</h1>

    @foreach ($dishes as $dish)
        <div class="flex rounded-2xl h-60 bg-neutral-50 shadow-2xl">
            <a class="flex w-[80%]"  href="{{ route('dish.page', ['dish_id' => $dish->id, 'locale' => 'pt']) }}">
                <div class=" h-full flex w-[35%] justify-center items-center relative rounded-2xl overflow-hidden">
                    <img id="preview_image_2" class=" h-full flex justify-center items-center object-cover" src="/images/imagesdish/{{json_decode($dish->images, true)['image_2']}}"  alt="">
                    <input accept="image/*" hidden type="file" name="image_2" id="image_2">
                    <span class="absolute bottom-0 left-0 w-10 h-10 text-white font-bold bg-red-500 flex justify-center items-center">{{$dish->numMenu}}</span>
                </div>
                <div class="grid grid-rows-10 w-[65%] p-4">
                    <h2 class="flex items-center font-bold row-span-3 text-3xl">{{$dish->name}}</h2>
                    <span class="row-span-5">{{json_decode($dish->description, true)['desc_pt'];}}</span>
                    <span class="row-span-2 text-green-700 font-bold text-2xl">{{ $formatter->formatCurrency($dish->price, 'BRL') }}</span>
                </div>   
            </a>
            <div class="w-[20%] flex flex-col items-center justify-center gap-5">
                <a class="text-white flex justify-center items-center rounded-full p-2 bg-blue-400 hover:bg-blue-500" href="{{ route('editDish.page', ['dish_id'=>$dish->id, 'locale' => 'pt']) }}"><i class="material-icons " style="font-size: 30px">edit</i> </a>

                <div class="flex justify-center items-center col-span-2">
                    <button data-id="{{$dish->id}}" id="dish" class="openModalConfirm rounded-full w-10 h-10 flex justify-center items-center bg-red-600 text-white hover:bg-red-700"><i class="material-icons text-white cursor-pointer" style="font-size: 30px">delete</i></button>
                </div>
                <!-- From Uiverse.io by TimTrayler -->
                <div class="flex flex-col gap-1 p-1 items-center justify-center">

                    <label class="switch">
                        <input @if ($dish->status == 'Disponível')
                        checked 
                        @endif class="change-status"  data-id="{{ $dish->id }}"  type="checkbox" name="status" value="Disponível">
                        <span class="slider"></span>
                    </label>

                    <span id="dishSpanCheckbox-{{$dish->id}}" class="text-2xl font-bold">{{$dish->status}}</span>
                </div> 

    

            </div>
        </div>
    @endforeach
 </section>
    
@endsection
