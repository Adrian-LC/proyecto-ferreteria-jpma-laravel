@extends('layouts.plantilla')

@section('content')
<section class="row m-0 justify-content-center">
  <div class="card col-12 col-md-7 col-lg-5">
    <h1 class="card-title text-center">Detalles del Cliente</h1>
    <img src="{{ ($client->avatar) ? asset('storage/avatar/'.$client->avatar) : asset('img/avatar_default.jpg') }}" class="card-img-top" alt="Avatar">
    <div class="card-body">
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">Nombre: {{ $client->first_name }}</li>
        <li class="list-group-item">Apellido: {{ $client->last_name }}</li>
        <li class="list-group-item">email: {{ $client->email }}</li>
        <li class="list-group-item">Categoría: {{ $client->user_category->name_uc }}</li>
        {{-- <li class="list-group-item">Estado: {{ ($client->state_u == 1) ? "Activado" : "Desactivado" }}</li> --}}
      </ul>
      <a class="btn btn-dark" href="{{ route('administrateClients') }}">{{ __('Administrar Clientes') }}</a>
    </div>
  </div>
</section>
@endsection
