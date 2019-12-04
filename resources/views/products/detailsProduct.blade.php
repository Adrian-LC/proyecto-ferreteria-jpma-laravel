@extends('layouts.plantilla')

@section('content')
<section class="row m-0 justify-content-center">
  <div class="card col-12 col-md-7 col-lg-5">
    <h1 class="card-title text-center">Detalles del Producto</h1>
    <img src="{{ asset('storage/poster/'.$product->poster) }}" class="card-img-top" alt="Poster">
    <div class="card-body">
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">Nombre: {{ $product->name_p }}</li>
        <li class="list-group-item">Categoría: {{ $product->product_category->name_pc }}</li>
        <li class="list-group-item">Detalle: {{ $product->detail }}</li>
        <li class="list-group-item">Precio ($): {{ $product->price_p }}</li>
        <li class="list-group-item">Oferta ($): {{ $product->offer }}</li>
        <li class="list-group-item">Stock: {{ $product->stock }}</li>
        <li class="list-group-item">Total Comprado: {{ $product->total_purchased }}</li>
        <li class="list-group-item">Producto en Sección "Nuevo": {{ ($product->new == 1) ? "Si" : "No" }}</li>
        <li class="list-group-item">Estado: {{ ($product->state_p == 1) ? "Activado" : "Desactivado" }}</li>
      </ul>
      <a class="btn btn-dark" href="{{ route('administrateProducts') }}">{{ __('Administrar Productos') }}</a>
    </div>
  </div>
</section>
@endsection
