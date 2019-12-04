<header class="_encabezado sticky-top">
  <nav class="navbar navbar-expand-lg pt-1 pb-1">
    <a class="navbar-brand p-0 m-0 order-2 order-lg-1 d-flex align-items-center" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo" width="45px"><span class="h3 text-white m-0">JPMA</span></a>
    <button class="navbar-toggler p-0 border-0 order-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <div class="_contenedor-hamburguesa">
        <div class="_hamburguesa">
          <div class="_linea"></div>
        </div>
      </div>
    </button>
    <div class="collapse navbar-collapse justify-content-lg-end order-4 order-lg-2" id="navbarSupportedContent">
      <ul class="navbar-nav pt-2 pt-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="">Preguntas Frecuentes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="">Contacto</a>
        </li>
        @guest
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
          </li>
        @else
          <li class="nav-item d-lg-none">
            <a class="nav-link text-white" href="">
              <img class="_nav-link-foto-perfil" src="{{ (Auth::user()->avatar) ? asset('storage/avatar/'.Auth::user()->avatar) : asset('img/avatar_default.jpg') }}" alt="Avatar">
              <span class="text-danger">{{ Auth::user()->first_name }}</span>{{ __(' - Mi Perfil') }}
            </a>
          </li>
          @if(Auth::user()->user_category_id == 1)
            <li class="nav-item d-lg-none">
              <a class="nav-link text-white" href="">{{ __('Administrar Clientes') }}</a>
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link text-white" href="{{ route('administrateProducts') }}">{{ __('Administrar Productos') }}</a>
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link text-white" href="{{ route('administrateProductCategories') }}">{{ __('Administrar Categorías Productos') }}</a>
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link text-white" href="{{ route('administrateFrequentQuestions') }}">{{ __('Administrar Preguntas Frecuentes') }}</a>
            </li>
          @endif
          <li class="nav-item d-lg-none">
            <a class="nav-link text-white" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
    @guest
      <a class="_carritoDos order-3 text-decoration-none bg-danger ml-lg-2 mr-lg-2" href="">
        <span class="icon-ecommerce"></span>
      </a>
    @else
      <div class="_opciones-usuario dropdown d-none d-lg-block order-lg-4 ml-2">
        <button class="_boton-foto-perfil btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ (Auth::user()->avatar) ? asset('storage/avatar/'.Auth::user()->avatar) : asset('img/avatar_default.jpg') }}" alt="Avatar"></button>
        <ul class="dropdown-menu {{ (Auth::user()->user_category_id == 1) ? '_admin' : '' }}" aria-labelledby="dropdownMenuButton">
          <li class="pt-1 pb-1 pl-4 pr-4 border-bottom text-danger">{{ Auth::user()->first_name }}</li>
          <li><a class="dropdown-item" href="">{{ __('Mi Perfil') }}</a></li>
          @if(Auth::user()->user_category_id == 1)
            <li><a class="dropdown-item" href="">{{ __('Administrar Clientes') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('administrateProducts') }}">{{ __('Administrar Productos') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('administrateProductCategories') }}">{{ __('Administrar Categorías Productos') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('administrateFrequentQuestions') }}">{{ __('Administrar Preguntas Frecuentes') }}</a></li>
          @endif
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </div>
      <a class="_carritoUno order-3 text-decoration-none bg-success ml-lg-2 mr-lg-2" href="">
        <span class="icon-ecommerce"></span>
        <span class="_cantidad">(0)</span>
      </a>
    @endguest
  </nav>
</header>
