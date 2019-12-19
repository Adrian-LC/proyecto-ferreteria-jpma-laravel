@extends('layouts.plantilla')

@section('content')
<!-- carousel -->
<section id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/carousel1.png') }}" class="w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/carousel2.jpg') }}" class="w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/carousel3.jpg') }}" class="w-100" alt="">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</section>
<!-- novedades -->
<h1 class="text-center">Novedades</h1>
<section class="_r-novedades row m-0 justify-content-center justify-content-lg-around">
  @foreach($newProducts as $key => $newProduct)
    @if($newProduct->product_category->state_pc == 1)
      <article class="col-8 mb-4 col-md-4 col-lg-2 bg-white p-1 d-flex flex-wrap justify-content-center align-content-between mx-md-5">
        <h3 class="_r-nuevo d-inline-block m-0 p-1 text-white">NUEVO</h3>
        <div>
          <img src="{{ asset('storage/poster/'.$newProduct->poster) }}" class="w-100" alt="">
          <p class="m-0 p-1 text-center">{{ $newProduct->name_p }}</p>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
          <h4 class="m-0 p-1 text-primary w-100 text-center">{{ '$'.$newProduct->price_p }}</h4>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="{{ '.bd-example-modal-lg-'.$key }}">VER MÁS</button>
          <!-- Modal -->
          <div class="modal fade {{ 'bd-example-modal-lg-'.$key }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myLargeModalLabel">{{ $newProduct->name_p }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @if(Auth::user())
                  <div id="{{ 'modal-message-'.$newProduct->id }}" class="alert alert-success text-center mb-0 py-1 d-none animated zoomIn fast" role="alert">
                      <strong>Se agregó el producto al carrito de compras.</strong>
                      <br>
                      <a  class="text-success" href="{{ route('myCart') }}"><b>{{ __('Ir a mi carrito') }}</b></a>
                  </div>
                @endif
                <div class="modal-body row m-0 justify-content-center align-items-lg-center">
                  <section class="col-10 col-md-7 col-lg-4">
                    <img src="{{ asset('storage/poster/'.$newProduct->poster) }}" class="w-100" alt="">
                  </section>
                  <section class="col-12 col-md-9 col-lg-5">
                    <h6><b>Datos Técnicos:</b></h6>
                    <p class="m-0">{{ $newProduct->detail }}</p>
                    <h4 class="m-0 pt-3 text-primary">{{ '$'.$newProduct->price_p }}</h4>
                  </section>
                </div>
                <div class="modal-footer row m-0 justify-content-center">
                  <form class="_addToCart col-12 col-md-9 col-lg-5 d-flex justify-content-center" action="" method="">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $newProduct->id }}">
                    <button type="submit" class="btn btn-success btn-sm">AÑADIR AL CARRITO</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>
    @endif
  @endforeach
</section>
<section class="text-center col-12 d-flex justify-content-center">
  {{ $newProducts->links() }}
</section>
@endsection

@section('script')
<script src="{{ asset('js/addToCart.js') }}" charset="utf-8"></script>
@endsection
