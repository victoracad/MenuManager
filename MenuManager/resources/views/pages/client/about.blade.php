@extends('layouts.client.main')
@section('title_page',  __('messages.Sobre'))
@section('icon_menu',  'arrow_back')
@section('funcBack',  'backPage()')
@section('content')
    <h1 class="text-4xl font-bold text-center">Conheça o nosso restaurante</h1>
    <div>
        <img src="https://u.cubeupload.com/apierre/PICABETO.png" alt="">
    </div>
    <p class="text-2xl text-red-500">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores suscipit modi dolor a ad iusto numquam qui</p>
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
            <span>(91) 3352-4870</span>
        </div>
        <span>Liga já para o nosso telefone e faça um pedido</span>
        
    </div>

    <div class="relative z-1 flex flex-col gap-2">
        <h2 class="text-2xl font-bold">Veja a nossa localização!</h2>
        <div id="map" class="w-full h-100 border">

        </div>
        <div class=" text-2xl">
            <i id="iconDrop" class="material-icons " style="font-size: 30px">location_on</i> 
            <span>R. Municipalidade, 1521 - Umarizal, Belém - PA, 66050-350</span>
        </div>
    </div>
    
    
    
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const latitude = -1.4360970534242976;
        const longitude = -48.48917277116443;
    
        const map = L.map('map').setView([latitude, longitude], 20);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
        }).addTo(map);
    
         // Adiciona um marcador
        L.marker([latitude, longitude]).addTo(map)
        .bindPopup('Aqui está o restaurante!')
        .openPopup();

      </script>
@endsection