<!-- This example requires Tailwind CSS v2.0+ -->
<?php
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\Route;

  $user = Auth::user();
  if (isset($user)){
    $userType = Auth::user()->type;
  }
  $route = Route::currentRouteName();
?>
@if (isset($user))
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button id="mobile-toggler" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.

              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.

              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center">
              <h1>SAAE</h1>
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="{{route("operation.index")}}" class="{{$route == 'operation.index' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'}} px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>

              @if ($userType == 1)

                  <a href="{{route("operation.archived")}}" class="{{$route == 'operation.archived' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'}} hover:text-white px-3 py-2 rounded-md text-sm font-medium">Arquivados</a>

                  <a href="{{route("register")}}" class="{{$route == 'register' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'}} hover:text-white px-3 py-2 rounded-md text-sm font-medium">Cadastrar usuário</a>

                  <a href="{{route("client.index")}}" class="{{$route == 'client.index' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'}} hover:text-white px-3 py-2 rounded-md text-sm font-medium">Gerenciar clientes</a>

                  <a href="{{route("operation.register")}}" class="{{$route == 'operation.register' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'}} hover:text-white px-3 py-2 rounded-md text-sm font-medium">Cadastrar procedimento</a>

              @endif
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
              <a href="{{route("logout")}}" class="text-red-700 hover:bg-gray-700 hover:text-red-500 px-3 py-2 rounded-md text-sm font-medium">Sair</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: " hover:text-white" -->
        <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

        @if ($userType == 1)

        <a href="{{route("operation.archived")}}" class="{{$route == 'operation.archived' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'}} hover:text-white px-3 py-2 rounded-md text-sm font-medium">Arquivados</a>

        <a href="{{route("register")}}" class="{{$route == 'register' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'}} hover:text-white block px-3 py-2 rounded-md text-base font-medium">Cadastrar usuário</a>

        <a href="{{route("operation.register")}}" class="{{$route == 'operation.register' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'}} hover:text-white block px-3 py-2 rounded-md text-base font-medium">Cadastrar procedimento</a>

        @endif
      </div>
    </div>
    <script>
      const mobMenu = document.querySelector("#mobile-menu")
      const mobButton = document.querySelector("#mobile-toggler")
      mobButton.onclick = () => {
          mobMenu.classList.contains("hidden") ?
          mobMenu.classList.remove("hidden") :
          mobMenu.classList.add("hidden")
      }
    </script>
  </nav>
@endif
