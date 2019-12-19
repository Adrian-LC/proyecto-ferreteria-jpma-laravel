@extends('layouts.plantilla')

@section('content')
<!-- categoría -->
<h1 class="text-center">{{ $category->name_pc }}</h1>
<section class="_r-novedades row m-0 justify-content-center justify-content-lg-around">
  @foreach($products as $key => $product)
    @if($product->state_p == 1)
      <article class="col-8 mb-4 col-md-4 col-lg-2 bg-white p-1 d-flex flex-wrap justify-content-center align-content-between mx-md-5">
        @if($product->new == 1)
          <h3 class="_r-nuevo d-inline-block m-0 p-1 text-white">NUEVO</h3>
        @endif
        <div>
          <img src="{{ asset('storage/poster/'.$product->poster) }}" class="w-100" alt="">
          <p class="m-0 p-1 text-center">{{ $product->name_p }}</p>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
          <h4 class="m-0 p-1 text-primary w-100 text-center">{{ '$'.$product->price_p }}</h4>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="{{ '.bd-example-modal-lg-'.$key }}">VER MÁS</button>
          <!-- Modal -->
          <div class="modal fade {{ 'bd-example-modal-lg-'.$key }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myLargeModalLabel">{{ $product->name_p }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @if(Auth::user())
                  <div id="{{ 'modal-message-'.$product->id }}" class="alert alert-success text-center mb-0 py-1 d-none animated zoomIn fast" role="alert">
                      <strong>Se agregó el producto al carrito de compras.</strong>
                      <br>
                      <a  class="text-success" href="{{ route('myCart') }}"><b>{{ __('Ir a mi carrito') }}</b></a>
                  </div>
                @endif
                <div class="modal-body row m-0 justify-content-center align-items-lg-center">
                  <section class="col-10 col-md-7 col-lg-4">
                    <img src="{{ asset('storage/poster/'.$product->poster) }}" class="w-100" alt="">
                  </section>
                  <section class="col-12 col-md-9 col-lg-5">
                    <h6>Datos Técnicos:</h6>
                    <p class="m-0">{{ $product->detail }}</p>
                    <h4 class="m-0 pt-3 text-primary">{{ '$'.$product->price_p }}</h4>
                  </section>
                </div>
                <div class="modal-footer row m-0 justify-content-center">
                  <form class="_addToCart col-12 col-md-9 col-lg-5 d-flex justify-content-center" action="" method="">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
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
  {{ $products->links() }}
</section>
@endsection

@section('script')
<script src="{{ asset('js/addToCart.js') }}" charset="utf-8"></script>
@endsection
