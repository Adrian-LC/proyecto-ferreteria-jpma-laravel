@extends('layouts.plantilla')

@section('content')
<section class="row m-0 justify-content-center">
  <div class="card col-12 col-md-7 col-lg-5">
    <h1 class="card-title text-center">Detalles del Administrador</h1>
    <img src="{{ ($administrator->avatar) ? asset('storage/avatar/'.$administrator->avatar) : asset('img/avatar_default.jpg') }}" class="card-img-top" alt="Poster">
    <div class="card-body">
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">Nombre: {{ $administrator->first_name }}</li>
        <li class="list-group-item">Apellido: {{ $administrator->last_name }}</li>
        <li class="list-group-item">email: {{ $administrator->email }}</li>
        <li class="list-group-item">Categoría: {{ $administrator->user_category->name_uc }}</li>
        <li class="list-group-item">Estado: {{ ($administrator->state_u == 1) ? "Activado" : "Desactivado" }}</li>
      </ul>
      <a class="btn btn-dark" href="{{ route('administrateAdministrators') }}">{{ __('Administrar Administradores') }}</a>
    </div>
  </div>
</section>
@endsection
