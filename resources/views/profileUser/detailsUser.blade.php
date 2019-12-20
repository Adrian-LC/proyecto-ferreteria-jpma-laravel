@extends('layouts.plantilla')

@section('content')
<section class="row m-0 justify-content-center py-3 px-2">
  <div class="_borderAnimation card col-12 col-md-7 col-lg-5 border-0 pt-2">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <h1 class="card-title text-center">Detalles del Administrador</h1>
    <img src="{{ ($user->avatar) ? asset('storage/avatar/'.$user->avatar) : asset('img/avatar_default.jpg') }}" class="card-img-top" alt="Poster">
    <div class="card-body">
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item"><b>Nombre: </b> {{ $user->first_name }}</li>
        <li class="list-group-item"><b>Apellido: </b> {{ $user->last_name }}</li>
        <li class="list-group-item"><b>email: </b> {{ $user->email }}</li>
      </ul>
      <a class="btn btn-dark" href="{{ route('myProfile') }}">{{ __('Volver a mi perfil') }}</a>
      <a class="btn btn-dark" href="{{ route('editUser') }}">{{ __('Editar') }}</a>
    </div>
  </div>
</section>
@endsection
