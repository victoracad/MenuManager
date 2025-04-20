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
            <a href="{{ route('dishes.page', ['locale' => 'pt'])}}">Cardápio</a>
        </div>
        <div class="flex  gap-2 items-center p-1 ">
            <i class="material-icons " style="font-size: 30px">group</i> 
            <a href="{{ route('users.page', ['locale' => 'pt'])}}">Gerentes</a>
        </div>
        <div class="flex  gap-2 items-center p-1 ">
            <i class="material-icons " style="font-size: 30px">post_add</i> 
            <a href="">Postagens</a>
        </div>
        <div class="flex  gap-2 items-center p-1 ">
            <i class="material-icons " style="font-size: 30px">trending_up</i> 
            <a href="{{ route('statsSystem.page', ['locale' => 'pt'])}}">Stats System</a>
        </div>
        <div class="flex  gap-2 items-center p-1 ">
            <i class="material-icons " style="font-size: 30px">sort</i> 
            <a href="{{ route('status.page', ['locale' => 'pt'])}}">Logs</a>
        </div>
    </div>
        
        <div class="flex items-center w-full p-1 gap-2">
            <i class="material-icons " style="font-size: 30px">logout</i> 
            <button data-id="logout" id="logout" class="openModalConfirm border border-white rounded-2xl cursor-pointer w-full hover:bg-white hover:text-black">Logout</button>
        </div>
        
        <div class="flex items-center gap-2 w-full">
            <div class="flex w-15 h-15 overflow-hidden rounded-full">
                <img class="object-cover w-full h-full" src="/images/imagesusers/{{$userauth->profile->avatar_image}}" alt="">
            </div>
            
            <span>{{$userauth->username}}</span>
        </div>
    
    
   </nav>

    @if (session('sucess'))
        <div id="flashMessage" class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow-md transition-opacity duration-500">
                <p class="sucess">{{session('sucess')}}</p>
        </div>
        <script>
            // Espera 3 segundos e começa a esconder
            setTimeout(() => {
            const flash = document.getElementById('flashMessage');
            if (flash) {
                flash.classList.add('opacity-0');
        
                // Depois de mais 0.5s (tempo da transição), remove do DOM
                setTimeout(() => {
                flash.remove();
                }, 500);
            }
            }, 3000);
        </script>
    @endif

    @if (session('error'))
        <div id="flashMessage" class="fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded shadow-md transition-opacity duration-500">
            <p>{{session('error')}}</p>
        </div>
        <script>
            // Espera 3 segundos e começa a esconder
            setTimeout(() => {
              const flash = document.getElementById('flashMessage');
              if (flash) {
                flash.classList.add('opacity-0');
        
                // Depois de mais 0.5s (tempo da transição), remove do DOM
                setTimeout(() => {
                  flash.remove();
                }, 500);
              }
            }, 3000);
        </script>
    @endif
    
   <section class="flex flex-col w-[50%] h-full">
        @yield('content')
   </section>
 </section>
<!--MODAL DE CONFIRMAÇÃO-->
 <div id="confirmModal" class="fixed inset-0 bg-gray-400/50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-xl shadow-lg p-6 max-w-sm w-full text-center">
        <h2 class="text-xl font-semibold mb-4">Tem certeza?</h2>
        <div class="flex justify-center gap-4">
            <button id="cancelModal"class="bg-gray-300 cursor-pointer px-4 py-2 rounded hover:bg-gray-400">Cancelar</button>
            <form id="formAction" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 cursor-pointer text-white px-4 py-2 rounded hover:bg-red-700">Confirmar</button>
            </form>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('confirmModal');
    const cancelBtn = document.getElementById('cancelModal');
    const formAction = document.getElementById('formAction');

    const openBtns = document.querySelectorAll('.openModalConfirm');

    openBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const itemId = btn.getAttribute('data-id');
            const TypeId = btn.getAttribute('id');
            if(itemId == "logout"){
                //alert('1');
                formAction.setAttribute('action', `/admin/logout/pt`);
                //modal.classList.remove('hidden');
            }else if(TypeId == "dish"){
                //alert('2');
                formAction.setAttribute('action', `/admin/deleteDish/${itemId}/pt`);
                modal.classList.remove('hidden');
            }else{
                //walert('3')
                formAction.setAttribute('action', `/admin/deleteUser/${itemId}/pt`);

                modal.classList.remove('hidden');
            }
  
        });
    });

    cancelBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    
</script>
    
@endsection
