@extends('layouts.client.main')
@section('title_page',  __('messages.title') )
@section('icon_menu',  'menu')

@section('content')
 <!--CARROSSEL-->
    <div class="w-full relative overflow-hidden z-1">
        <div id="carousel" class="flex w-full h-60 duration-500 ease-in-out">
            <div class="flex w-full shrink-0">
                <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/vetores-gratis/modelo-de-pagina-de-destino-de-comida-americana_23-2148963068.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" class="w-full shrink-0" />
            </div>
            <div class="w-full shrink-0 ">
                <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/vetores-gratis/modelo-de-banner-de-comida-americana-com-foto-de-hamburguer_23-2148901385.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" />
            </div>
            <div class="w-full shrink-0">
                <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/vetores-gratis/modelo-de-banner-de-comida-americana_23-2148929022.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" class="w-full shrink-0" />
            </div>
           
        </div>

        <!-- Botões -->
        <button onclick="prevSlide()" class="w-10 h-10 absolute left-1 top-1/2 transform rounded-full -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-2">
        ‹
        </button>
        <button onclick="nextSlide()" class="w-10 h-10 rounded-full absolute right-1 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-2">
        ›
        </button>
    </div>
<!--CARROSSEL-->

    <div class="flex flex-col gap-5">
        <a href="{{ route('cat.page', ['cat'=>'Carne_Bovina', 'locale'=>app()->getLocale()]) }}" class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/free-photo/delicious-meat-table_23-2150857736.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.Carne_Bovina') }}</h2>
                </div>
            </div>
        </a>

        <a href="{{ route('cat.page', ['cat'=>'Carne_Suina', 'locale'=>app()->getLocale()]) }}" class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-gratis/entrecosto-grelhado-na-brasa-com-molho-barbecue-com-fogo-ai-generative_123827-23822.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.Carne_Suina') }}</h2>
                </div>
            </div>
        </a>

        <a  href="{{ route('cat.page', ['cat'=>'Frango', 'locale'=>app()->getLocale()]) }}" class="w-full" >
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-gratis/asas-de-frango-grelhado-na-grelha-em-chamas-com-legumes-grelhados-em-molho-barbecue-com-sementes-de-pimenta-alecrim-sal_1150-37861.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.Frango') }}</h2>
                </div>
            </div>
        </a>

        <a  href="{{ route('cat.page', ['cat'=>'Peixe', 'locale'=>app()->getLocale()]) }}" class="w-full" >
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-gratis/bife-de-file-de-carne-de-salmao_74190-739.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.Peixe') }}</h2>
                </div>
            </div>
        </a>

        <a href="{{ route('cat.page', ['cat'=>'Pratos_Feitos', 'locale'=>app()->getLocale()]) }}" class="w-full" >
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://i.pinimg.com/564x/33/16/1a/33161ab89af9882251972111ae710d59.jpg" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.Pratos_Feitos') }}</h2>
                </div>
            </div>
        </a>

        <a href="{{ route('cat.page', ['cat'=>'Bebidas', 'locale'=>app()->getLocale()]) }}" class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-gratis/coca-cola-fizzy-beber-tiro-macro_53876-32244.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.Bebidas') }}</h2>
                </div>
            </div>
        </a>

        <a href="{{ route('cat.page', ['cat'=>'Porcoes', 'locale'=>app()->getLocale()]) }}" class="w-full" >
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-gratis/batatas-fritas-crocantes-com-ketchup-e-maionese_1150-26588.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.Porcoes') }}</h2>
                </div>
            </div>
        </a>

        <a href="{{ route('cat.page', ['cat'=>'Sobremesas', 'locale'=>app()->getLocale()]) }}" class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-premium/delicioso-brownie-de-chocolate-na-mesa_74692-720.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.Sobremesas') }}</h2>
                </div>
            </div>
        </a>
    </div>

    
    <script>
        const carousel = document.getElementById('carousel');
        const totalSlides = carousel.children.length;
        let index = 0;
    </script>
@endsection