@extends('layouts.client.main')
@section('title_page',  __('messages.title') )
@section('icon_menu',  'menu')

@section('content')
    <div class="rounded-4xl flex overflow-hidden shadow">
        <img src="https://img.freepik.com/free-photo/plate-grilled-meat-tomatoes_23-2148224116.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
    </div>

    <div class="flex flex-col gap-5">
        <a href="{{ route('cat.page', ['cat'=>'Carne_Bovina', 'locale'=>app()->getLocale()]) }}" class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/free-photo/delicious-meat-table_23-2150857736.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.cat_1') }}</h2>
                </div>
            </div>
        </a>

        <div class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-gratis/entrecosto-grelhado-na-brasa-com-molho-barbecue-com-fogo-ai-generative_123827-23822.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.cat_2') }}</h2>
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-gratis/asas-de-frango-grelhado-na-grelha-em-chamas-com-legumes-grelhados-em-molho-barbecue-com-sementes-de-pimenta-alecrim-sal_1150-37861.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.cat_3') }}</h2>
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://i.pinimg.com/564x/33/16/1a/33161ab89af9882251972111ae710d59.jpg" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.cat_4') }}</h2>
                </div>
            </div>
        </div>

        <a href="{{ route('cat.page', ['cat'=>'Bebidas', 'locale'=>app()->getLocale()]) }}" class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-gratis/coca-cola-fizzy-beber-tiro-macro_53876-32244.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.cat_5') }}</h2>
                </div>
            </div>
        </a>

        <div class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-gratis/batatas-fritas-crocantes-com-ketchup-e-maionese_1150-26588.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.cat_6') }}</h2>
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="grid grid-cols-10 h-35 rounded-2xl overflow-hidden bg-[#B22222] shadow-2xl">
                <div class="col-span-5">
                    <img class="w-full h-full object-cover rounded-2xl" src="https://img.freepik.com/fotos-premium/delicioso-brownie-de-chocolate-na-mesa_74692-720.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
                </div>
                <div class="col-span-5 flex justify-center items-center text-white">
                    <h2 class="text-center text-3xl font-bold">{{ __('messages.cat_7') }}</h2>
                </div>
            </div>
        </div>
    </div>
    
@endsection