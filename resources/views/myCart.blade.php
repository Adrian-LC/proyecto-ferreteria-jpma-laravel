@extends('layouts.plantilla')

@section('content')
<!-- mi carrito -->
<section class="_mc-carrito row m-0 justify-content-around align-items-start">
  <section class="bg-white p-2 col-11 mb-4 mb-lg-0 col-md-7 col-lg-8">
    <h1 class="border-bottom border-secondary text-center">Mi Carrito</h1>
    @foreach($orders as $order)
      <div id="{{ 'div'.$order->product_id }}">
        <article class="row m-0 p-1 m-2 border">
          <div class="col-lg-2">
            <img src="{{ asset('storage/poster/'.$order->product->poster) }}" class="w-100" alt="Poster">
          </div>
          <div class="col-lg-4 d-flex justify-content-center align-items-center">
            <div>
              <p class="m-0 text-center">{{ $order->product->name_p }}</p>
              <p class="m-0 text-center">{{ '$'.$order->product->price_p }}</p>
            </div>
          </div>
          <div class="col-lg-2 d-flex justify-content-center align-items-center">
            <div class="w-50">
              <form action="" method="">
                @csrf
                <input type="hidden" name="product_id" value="{{ $order->product_id }}">
                <input class="_quantity w-100" type="number" name="quantity" value="{{ $order->quantity }}" min="0">
              </form>
            </div>
          </div>
          <div class="col-lg-3 d-flex justify-content-center align-items-center">
            <div>
              <p class="m-0 text-center">subtotal:</p>
              <p id="{{ 'quantity'.$order->product_id }}" class="m-0 text-center">{{ '$'.($order->quantity * $order->product->price_p) }}</p>
            </div>
          </div>
          <div class="col-lg-1 d-flex justify-content-center align-items-center">
            <form action="" method="">
              @csrf
              <input type="hidden" name="product_id" value="{{ $order->product_id }}">
              <ion-icon class="_deleteOrder" name="trash"></ion-icon>
            </form>
          </div>
        </article>
      </div>
    @endforeach
  </section>
  <section class="p-0 col-11 col-md-4 col-lg-3">
    <section class="bg-white p-2 mb-3">
      <h2 class="border-bottom border-secondary text-center">Resumen</h2>
      <p class="m-0">Transporte:</p>
      <p class="m-0">Impuesto:</p>
      <p id="totalPrice" class="border-bottom border-secondary">{{ 'Total: $'.$totalPrice }}</p>
      <button type="button" class="btn btn-danger btn-block">INICIAR PAGO</button>
    </section>
    <section class="p-2">
      <p class="m-0 border-bottom border-secondary"><ion-icon name="logo-model-s"></ion-icon>
        Realizamos envíos por OCA, MercadoEnvíos, o Camioneta (Sin cargo por volumen)
      </p>
      <p class="m-0 border-bottom border-secondary"><ion-icon name="logo-usd"></ion-icon>
        El Precio Internet corresponde al precio para el pago en 1 (una) cuota con tarjeta de cŕedito
      </p>
      <p class="m-0"><ion-icon name="checkmark"></ion-icon>
        ¡El pedido sólo se confirmará al hacer click en el botón "Pedido con obligación de pago" en la última parte del proceso de compra!
      </p>
    </section>
  </section>
</section>
@endsection

@section('script')
<script src="{{ asset('js/myCart.js') }}" charset="utf-8"></script>
@endsection
