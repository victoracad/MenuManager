@extends('layouts.header')
@section('main')
 <section class=" flex flex-col justify-center items-center p-10 w-full h-lvh">
   <nav class="fixed flex flex-col h-full w-auto items-center left-0 p-5 gap-30 bg-[#D32F2F] text-white text-2xl">
    <div class="w-40">
        <a href="{{ route('dashboard', ['locale' => 'pt'])}}"><img src="/images/placeholders/placeholderlogo.png" alt=""></a>
    </div>
    <div class="flex flex-col gap-3 ">
        <div class="flex  items-center p-1  gap-2">
            <i class="material-icons " style="font-size: 30px">home</i> 
            <a href="{{ route('dashboard', ['locale' => 'pt'])}}">Home</a>
        </div>
        <div class="flex  items-center p-1  gap-2">
            <i class="material-icons " style="font-size: 30px">menu_book</i> 
            <a href="{{ route('dishes.page')}}">Cardápio</a>
        </div>
        <div class="flex  gap-2 items-center p-1 ">
            <i class="material-icons " style="font-size: 30px">group</i> 
            <a href="{{ route('users.page')}}">Gerentes</a>
        </div>
        <div class="flex  gap-2 items-center p-1 ">
            <i class="material-icons " style="font-size: 30px">post_add</i> 
            <a href="">Postagens</a>
        </div>
        <div class="flex  gap-2 items-center p-1 ">
            <i class="material-icons " style="font-size: 30px">attach_money</i> 
            <a href="">Anunciantes</a>
        </div>
        <div class="flex  gap-2 items-center p-1 ">
            <i class="material-icons " style="font-size: 30px">trending_up</i> 
            <a href="{{ route('status.page')}}">Status</a>
        </div>
    </div>
    <form class="flex flex-col items-center w-full p-1 gap-2" action="{{ route('logout')}}" method="POST">
        @csrf
        <div class="flex items-center w-full p-1 gap-2">
            <i class="material-icons " style="font-size: 30px">logout</i> 
        <input class="border border-white rounded-2xl cursor-pointer w-full hover:bg-white hover:text-black" type="submit" value="Sair">
        </div>
        
        <div class="flex items-center gap-2 w-full">
            <div class="flex w-15 h-15 overflow-hidden rounded-full">
                <img class="object-cover w-full h-full" src="/images/imagesusers/{{$userauth->profile->avatar_image}}" alt="">
            </div>
            
            <span>{{$userauth->username}}</span>
        </div>
    </form>
    
   </nav>
    @if (session('sucess'))
    <div class="fixed flex top-0 rounded-b-2xl w-70 bg-green-400 h-20 right-[45%] justify-center items-center text-2xl p-2">
            <p class="sucess">{{session('sucess')}}</p>
    </div>
    @endif
    @if (session('error'))
        <div class="fixed flex top-0 rounded-b-2xl w-70 bg-red-400 font-bold h-20 right-[45%] justify-center items-center text-2xl p-2">
            <p>{{session('error')}}</p>
        </div>
    @endif
   <section class="flex flex-col w-[50%] h-full">
        @yield('content')
   </section>
 </section>
    
@endsection
