@extends('layouts.client.header')
@section('main')
<div class="sm:w-[450px]">
    <nav class="fixed sm:w-[450px] grid grid-cols-10 top-0 w-full h-20 z-2 bg-red-600">
        @hasSection('funcBack')
            <div id="@yield('funcBack')" class="cursor-pointer flex pl-6 items-center col-span-2 text-2xl text-[#ffff] font-bold">
                <i class="material-icons " style="font-size: 45px">arrow_back</i>
            </div>
        @endif

        <div class="flex pl-6 items-center
        @hasSection ('funcBack')
            col-span-6
        @else
            col-span-8
        @endif  text-2xl text-[#ffff] font-bold">
            <h1> @yield('title_page')</h1>
        </div>
        <div 
            class="cursor-pointer col-span-2 flex justify-center items-center text-white"
            id="icon-menu"
        >
            <i id="icon-burguer" class="material-icons " style="font-size: 45px">menu</i> 
        </div>

    </nav>
    

    <section  class="w-full p-5 flex gap-5 flex-col">
        @yield('content')
    </section>

    <section id="sideBar" class="fixed sm:w-[350px] w-[80%] flex flex-col  bg-white z-3 h-full transform -translate-x-[100%] transition-transform top-0">

        <div class="flex w-full h-[12%] bg-red-600">
            <div class="flex justify-center items-center w-[75%]">
                <img class="h-full" src="/images/placeholders/placeholderlogo.png" alt="">
            </div>
            <div class="flex justify-center items-center w-[25%]">
                <div class="relative w-full h-full bg-white p-2">
                    <div class="flex justify-center items-center h-[40%]">
                        <i id="iconMenu" class="material-icons " style="font-size: 30px">translate</i> 
                    </div>
                    <div class="h-[60%] rounded-2xl overflow-hidden">
                        <img class="w-full h-full object-cover" src=" 
                        @if (app()->getLocale() == 'pt')
                            https://img.freepik.com/vetores-gratis/ilustracao-de-bandeira-brasil_53876-27017.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740
                            @else @if (app()->getLocale() == 'in')
                                https://img.freepik.com/vetores-premium/bandeira-do-fundo-da-america-dos-estados-unidos_850624-64.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740
                            @else
                                https://img.freepik.com/vetores-gratis/ilustracao-de-espanha-bandeira_53876-18168.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740
                            @endif
                        @endif
                        " alt="">

                    </div>
                    <div id="dropdown"
                        class="absolute shadow-2xl rounded-b-2xl top-[99%] border border-gray-200 left-0 w-full bg-white text-black overflow-hidden transition-all duration-300"
                        style="max-height: 30px;">
                        <div id="trigger" class="flex justify-center items-center h-[30%]">
                            <i id="iconDrop" class="material-icons " style="font-size: 30px">arrow_drop_down</i> 
                        </div>
                        <div class="flex flex-col p-2">
                            <a class="flex flex-col" href="{{$urlNoLocation}}/pt">
                                <span class="flex text-2xl font-bold items-center justify-center">pt</span>
                                <div class="">
                                    <img class="w-full h-15 rounded-2xl object-cover" src="https://img.freepik.com/vetores-gratis/ilustracao-de-bandeira-brasil_53876-27017.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                                </div>
                            </a>
                            <a class="flex flex-col" href="{{$urlNoLocation}}/in">
                                <span class="flex text-2xl font-bold items-center justify-center">en</span>
                                <div class="">
                                    <img class="w-full h-15 rounded-2xl object-cover" src="https://img.freepik.com/vetores-premium/bandeira-do-fundo-da-america-dos-estados-unidos_850624-64.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                                </div>
                            </a>
                            <a class="flex flex-col" href="{{$urlNoLocation}}/es">
                                <span class="flex text-2xl font-bold items-center justify-center">es</span>
                                <div class="">
                                    <img class="w-full h-15 rounded-2xl object-cover" src="https://img.freepik.com/vetores-gratis/ilustracao-de-espanha-bandeira_53876-18168.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                                </div>
                            </a>
                            
                            
                        </div>
                    </div>

                </div>
            </div>
        <!--Seletor de linguagem -->
        </div>
        <div class="overflow-scroll flex flex-col gap-5 text-3xl p-5 pt-20 w-full h-[88%]">
            <div class="flex items-center">
                <a href="{{ route('home.page', ['locale'=>app()->getLocale()]) }}" class="w-full">
                    {{__('messages.inicio')}}
                </a>
            </div>   
            <div class="flex items-center">
                <a href="{{ route('cat.page', ['cat'=>'Carne_Bovina', 'locale'=>app()->getLocale()]) }}" class="w-full">
                    {{__('messages.Carne_Bovina')}}
                </a>
            </div>   
            <div class="flex items-center">
                <a href="{{ route('cat.page', ['cat'=>'Carne_Suina', 'locale'=>app()->getLocale()]) }}" class="w-full">
                    {{__('messages.Carne_Suina')}}
                </a>
            </div>   
            <div class="flex items-center">
                <a href="{{ route('cat.page', ['cat'=>'Frango', 'locale'=>app()->getLocale()]) }}" class="w-full">
                    {{__('messages.Frango')}}
                </a>
            </div>   
            <div class="flex items-center">
                <a href="{{ route('cat.page', ['cat'=>'Pratos_Feitos', 'locale'=>app()->getLocale()]) }}" class="w-full">
                    {{__('messages.Pratos_Feitos')}}
                </a>
            </div>   
            <div class="flex items-center">
                <a href="{{ route('cat.page', ['cat'=>'Bebidas', 'locale'=>app()->getLocale()]) }}" class="w-full">
                    {{__('messages.Bebidas')}}
                </a>
            </div>   
            <div class="flex items-center">
                <a href="{{ route('cat.page', ['cat'=>'Porcoes', 'locale'=>app()->getLocale()]) }}" class="w-full">
                    {{__('messages.Porcoes')}}
                </a>
            </div>   
            <div class="flex items-center">
                <a href="{{ route('cat.page', ['cat'=>'Sobremesas', 'locale'=>app()->getLocale()]) }}" class="w-full">
                    {{__('messages.Sobremesas')}}
                </a>
            </div>   
            <hr>
            <div class="flex items-center">
                <a href="{{ route('about.page', ['locale'=>app()->getLocale()]) }}" class="w-full">
                    {{__('messages.Sobre')}}
                </a>
            </div> 
              
            
        </div>

    </section>

    <div class="fixed sm:w-[350px] hidden w-[80%] sm:flex flex-col  bg-white z-3 h-full transform -translate-x-[100%] transition-transform top-0">

    </div>

    <footer class="fixed sm:w-[450px] flex text-white justify-center items-center bottom-0 z-3 bg-red-600 h-20 w-full">
        <h1>&copy; Todos os direitos reservados</h1>
    </footer>
</div>
    

@endsection