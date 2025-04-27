@extends('layouts.client.main')
@section('title_page',  __('messages.Sobre'))
@section('icon_menu',  'arrow_back')
@section('funcBack',  'backPage()')
@section('content')
    @if ($about == null)
        <h1 class="text-4xl font-bold text-center">Conheça o nosso restaurante</h1>
        <div>
            <img src="https://img.freepik.com/fotos-gratis/grupo-de-chefs-trabalhando-na-cozinha_53876-42734.jpg?uid=R90232147&ga=GA1.1.1266164437.1743623360&semt=ais_hybrid&w=740" alt="">
        </div>
        <p class="text-2xl text-red-500">Descrição do seu estabelecimento</p>
        <div class="flex flex-col">
            <h2 class="text-4xl font-bold">Informações para Contato</h2>
            <a href="#" class="text-4xl">
                <i class="fab fa-facebook-f"></i>
                <span>Facebook</span>
            </a>
            <a href="#" class="text-4xl">
                <i class="fab fa-instagram"></i>
                <span>Instagram</span>
            </a>
            <div class="text-4xl">
                <i class="fab fa-whatsapp"></i>
                <span>(99)99999-9999</span>
            </div>
            <span>Liga já para o nosso telefone e faça um pedido</span>
            
        </div>

        <div class="relative z-1 flex flex-col gap-2">
            <h2 class="text-2xl font-bold">Veja a nossa localização!</h2>
            <div id="map" class="w-full h-100 border">

            </div>
            <div class=" text-2xl">
                <i id="iconDrop" class="material-icons " style="font-size: 30px">location_on</i> 
                <span>Belém Pará</span>
            </div>
        </div>
        
        
        
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
            const latitude = -1.456247459908747;
            const longitude = -48.50121128306959;
        
            const map = L.map('map').setView([latitude, longitude], 20);
        
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
            }).addTo(map);
        
            L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Aqui está o restaurante!')
            .openPopup();

        </script>
    @else
    <h1 class="text-4xl font-bold text-center">Conheça o nosso restaurante</h1>
    <div>
        <img src="/images/imagesAbout/{{$about->image}}" alt="">
    </div>
    <p class="text-2xl text-red-500">{{$about->description}}</p>
    <div class="flex flex-col">
        <h2 class="text-4xl font-bold">Informações para Contato</h2>
        <a href="{{$about->url_facebook}}" class="text-4xl">
            <i class="fab fa-facebook-f"></i>
            <span>Facebook</span>
        </a>
        <a href="{{$about->url_instagram}}" class="text-4xl">
            <i class="fab fa-instagram"></i>
            <span>Instagram</span>
        </a>
        <div class="text-4xl">
            <i class="fab fa-whatsapp"></i>
            <span>{{$about->telefone}}</span>
        </div>
        <span>Liga já para o nosso telefone e faça um pedido</span>
        
    </div>

    <div class="relative z-1 flex flex-col gap-2">
        <h2 class="text-2xl font-bold">Veja a nossa localização!</h2>
        <div id="map" class="w-full h-100 border">

        </div>
        <div class=" text-2xl">
            <i id="iconDrop" class="material-icons " style="font-size: 30px">location_on</i> 
            <span>{{json_decode($about->localizations, true)['address']}}</span>
        </div>
    </div>
    
    
    
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const latitude = {{json_decode($about->localizations, true)['latitude']}};
        const longitude = {{json_decode($about->localizations, true)['longitude']}};
    
        const map = L.map('map').setView([latitude, longitude], 20);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
        }).addTo(map);
    
        L.marker([latitude, longitude]).addTo(map)
        .bindPopup('Aqui está o restaurante!')
        .openPopup();

      </script>
    @endif
    
@endsection