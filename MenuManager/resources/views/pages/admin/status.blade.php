@extends('layouts.main')
@section('title', 'Bem vindo a dashboard')
@section('content')
 <section class="border flex flex-col p-10">
   <h1>Aqui você poderá acompanhar todas as alterações feitas</h1>

   @foreach ($Systemevents as $Systemevent)
       <p>O usuário {{$Systemevent->user->username}} fez uma alteração do tipo {{$Systemevent->typechange}} na tabela {{$Systemevent->tablechange}}</p>
   @endforeach
 </section>
    
@endsection
