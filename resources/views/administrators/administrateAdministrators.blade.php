@extends('layouts.plantilla')

@section('content')
<h1 class="text-center">Administrar Administradores</h1>
<section class="pb-1 d-flex justify-content-between">
  <form class="d-flex align-items-center" action="{{ route('searchAdministrators') }}" method="GET">
    <input class="btn btn-primary" type="submit" value="Buscar"><input type="text" name="search">
  </form>
  <a class="btn btn-success" href="{{ route('addAdministrator') }}">{{ __('Agregar Administrador') }}</a>
</section>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">Nombre Completo</th>
      <th class="text-center" scope="col">Correo Electrónico</th>
      <th class="text-center" scope="col">Estado</th>
      <th class="text-center" scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($administrators as $key => $administrator)
      <tr>
        <th class="text-center" scope="row">{{ $key+1 }}</th>
        <td class="text-center">{{ $administrator->fullName() }}</td>
        <td class="text-center">{{ $administrator->email }}</td>
        <td class="text-center">{{ ($administrator->state_u == 1) ? "Activado" : "Desactivado" }}</td>
        <td class="text-center">
          <a class="btn btn-warning" href="{{ route('detailsAdministrator', $administrator->id) }}">{{ __('Detalles') }}</a>
          <a class="btn btn-danger" href="{{ route('editAdministrator', $administrator->id) }}">{{ __('Editar') }}</a>
        </td>
      </tr>
    @endforeach
  </tbody>
  {{ $administrators->links() }}
</table>
@endsection
