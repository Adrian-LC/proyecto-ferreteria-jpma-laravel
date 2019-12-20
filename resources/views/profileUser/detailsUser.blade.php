@extends('layouts.plantilla')

@section('content')
<section class="row m-0 justify-content-center">
  <div class="card col-12 col-md-7 col-lg-5">
    <h1 class="card-title text-center">Datos Personales</h1>
    <img src="{{ ($user->avatar) ? asset('storage/avatar/'.$user->avatar) : asset('img/avatar_default.jpg') }}" class="card-img-top" alt="Avatar">
    <div class="card-body">
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">Nombre: {{ $user->first_name }}</li>
        <li class="list-group-item">Apellido: {{ $user->last_name }}</li>
        <li class="list-group-item">email: {{ $user->email }}</li>
      </ul>
      <a class="btn btn-dark" href="{{ route('editUser') }}">{{ __('Editar') }}</a>
    </div>
  </div>
</section>
@endsection
