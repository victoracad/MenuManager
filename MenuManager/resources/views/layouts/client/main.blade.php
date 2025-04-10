@extends('layouts.client.header')
@section('main')
    <nav class="fixed grid grid-cols-10 top-0 w-full h-20 bg-red-600">
        <div class="col-span-2 flex justify-center items-center text-white">
            <i class="material-icons " style="font-size: 45px">@yield('icon_menu')</i> 
        </div>
        <div class="flex pl-6 items-center col-span-6 text-2xl text-[#ffff] font-bold">
            <h1> @yield('title_page')</h1>
        </div>
        <div class="col-span-2 flex justify-center items-center p-1">
            <div class="relative rounded-2xl overflow-hidden h-[80%] ">
                <img class="w-full h-full object-cover" src="https://img.freepik.com/vetores-gratis/ilustracao-de-bandeira-brasil_53876-27017.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                <i class="material-icons absolute top-6.5 left-3.5" style="font-size: 45px">keyboard_arrow_down</i> 
            </div>
        </div>
    </nav>
    <section class="w-full p-5 flex gap-10 flex-col">
        @yield('content')
    </section>
    <footer class="fixed flex text-white justify-center items-center bottom-0 bg-red-600 h-20 w-full">
        <h1>Todos os direitos reservados</h1>
    </footer>
@endsection