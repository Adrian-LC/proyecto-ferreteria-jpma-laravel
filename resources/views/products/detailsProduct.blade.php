@extends('layouts.plantilla')

@section('content')
<section class="row m-0 justify-content-center py-3 px-2">
  <div class="_borderAnimation card col-12 col-md-7 col-lg-5 border-0 pt-2">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <h1 class="card-title text-center">Detalles del Producto</h1>
    <img src="{{ asset('storage/poster/'.$product->poster) }}" class="card-img-top" alt="Poster">
    <div class="card-body">
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item"><b>Nombre: </b> {{ $product->name_p }}</li>
        <li class="list-group-item"><b>Categoría: </b> {{ $product->product_category->name_pc }}</li>
        <li class="list-group-item"><b>Detalle: </b> {{ $product->detail }}</li>
        <li class="list-group-item"><b>Precio ($): </b> {{ $product->price_p }}</li>
        <li class="list-group-item"><b>Oferta ($): </b> {{ $product->offer }}</li>
        <li class="list-group-item"><b>Stock: </b> {{ $product->stock }}</li>
        <li class="list-group-item"><b>Total Comprado: </b> {{ $product->total_purchased }}</li>
        <li class="list-group-item"><b>Producto en Sección "Novedades": </b> {{ ($product->new == 1) ? "Si" : "No" }}</li>
        <li class="list-group-item"><b>Estado: </b> {{ ($product->state_p == 1) ? "Activado" : "Desactivado" }}</li>
      </ul>
      <a class="btn btn-dark" href="{{ route('administrateProducts') }}">{{ __('Administrar Productos') }}</a>
    </div>
  </div>
</section>
@endsection
