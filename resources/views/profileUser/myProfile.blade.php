@extends('layouts.plantilla')

@section('content')
<!--Perfil-->
<main class="pf-div col-12 m-0 p-0">
        <div class="derecha col-12 p-0 m-0 mb-2">
          <div class="primera">
            <div class="banner-perfil col-12 p-0 " >
              <img class="img-banner-perfil col-12 p-0" src="{{asset('img/universe-buena.jpg')}}" alt="">
                <div class="img-perfil">
                  <img src="{{ (Auth::user()->avatar) ? asset('storage/avatar/'.Auth::user()->avatar) : asset('img/avatar_default.jpg') }}" alt="">
                </div>
            </div>
          
          <div class="col-12 col-md-9 subMenu-perfil ">
            <ul class="lista">
              <li id="option" class="option"><a href="">Datos Personales</a></li>
              <li id="option" class="option"><a href="">Mis compras</a></li>
            </ul>
          </div>
        </div>
        <!---->
          <div class="float-none der-abajo flex-column col-12 p-0">
            <div class="der-abajo-arriba flex-column flex-nowrap col-12 mb-3 p-0">
              <div>
                <h2>Últimas compras</h2>
              </div>
              <div class="col-12  mt-3 border-top p-0 text-center">
                  <section class="ofertas col-12 flex-wrap justify-content-around p-3 m-0 row">
                      <article class="col-12 col-lg-3 p-0 mb-2 mb-lg-0 column bg-white">
                        <img class="col-12 p-0" src="{{asset('img/logo.png')}}" alt="">
                        <p>Lorem, ipsum.</p>
                      </article>
                      <article class="col-12 col-lg-3 p-0 mb-2 mb-lg-0 bg-white">
                        <img class="col-12 p-0 " src="{{asset('img/logo.png')}}" alt="">
                        <p>Lorem, ipsum.</p>
                      </article>
                      <article class="col-12 col-lg-3 p-0 mb-2 mb-lg-0 bg-white">
                        <img class="col-12 p-0 " src="{{asset('img/logo.png')}}" alt="">
                        <p>Lorem, ipsum.</p>
                      </article>
                  </section>
              </div>
              
            </div>
          <!--tal vez nuevo div-->
          </div>
        </div>
      </main>
@endsection
