@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
 <section class="shadow-2xl flex flex-col p-10 gap-2">
   <h1 class="text-4xl font-bold flex justify-center items-center text-center">Aqui você poderá acompanhar as últimas alterações feitas</h1>

   @foreach ($Systemevents as $Systemevent)
   <div class="flex flex-col border-b">
       <div class="text-2xl">O usuário <span class="font-bold">{{$Systemevent->user->username}}</span>,
          @switch($Systemevent->typechange)
            @case('create')
                Criou um novo
                @break
            @case('delete')
                Deletou um
                @break
            @case('update')
                Atualizou um
                @break
            @default
                
          @endswitch   
          @switch($Systemevent->tablechange)
            @case('dishes')
                Prato.
                @break
            @case('users/users_profile')
                Usuário.
                @break
            @case('users')
                Usuário.
                @break
            @default
          @endswitch 
          
      </div>
      <span class="overflow-hidden">Dados: 
        @foreach (json_decode($Systemevent->update_info, true) as $dado => $info)
          <span class="font-bold">
            {{$dado}}
          </span>
          <span >
            {{$info}}
          </span>
          <br>
        @endforeach
      </span>
      <span>Horário: 
        {{ \Carbon\Carbon::parse($Systemevent->created_at)->format('d/m/Y H:i') }}
      </span>
    </div>
   @endforeach
 </section>
    
@endsection
