@extends('layouts.plantilla')

@section('content')
<section class="row m-0 justify-content-center py-3 px-2">
  <div class="_borderAnimation card col-12 col-md-7 col-lg-5 border-0 pt-2">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <h1 class="card-title text-center">Detalles del Administrador</h1>
    <img src="{{ ($administrator->avatar) ? asset('storage/avatar/'.$administrator->avatar) : asset('img/avatar_default.jpg') }}" class="card-img-top" alt="Poster">
    <div class="card-body">
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item"><b>Nombre: </b> {{ $administrator->first_name }}</li>
        <li class="list-group-item"><b>Apellido: </b> {{ $administrator->last_name }}</li>
        <li class="list-group-item"><b>email: </b> {{ $administrator->email }}</li>
        <li class="list-group-item"><b>Categoría: </b> {{ $administrator->user_category->name_uc }}</li>
        {{-- <li class="list-group-item">Estado: {{ ($administrator->state_u == 1) ? "Activado" : "Desactivado" }}</li> --}}
      </ul>
      <a class="btn btn-dark" href="{{ route('administrateAdministrators') }}">{{ __('Administrar Administradores') }}</a>
    </div>
  </div>
</section>
@endsection
