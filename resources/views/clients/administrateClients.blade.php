@extends('layouts.plantilla')

@section('content')
<h1 class="text-center">Administrar Clientes</h1>
<section class="pb-1 d-flex justify-content-between">
  <form class="d-flex align-items-center" action="{{ route('searchClients') }}" method="GET">
    <input class="btn btn-primary" type="submit" value="Buscar"><input type="text" name="search">
  </form>
  <a class="btn btn-success" href="{{ route('addClient') }}">{{ __('Agregar Clientes') }}</a>
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
    @foreach($clients as $key => $client)
      <tr>
        <th class="text-center" scope="row">{{ $key+1 }}</th>
        <td class="text-center">{{ $client->fullName() }}</td>
        <td class="text-center">{{ $client->email }}</td>
        <td class="text-center">{{ ($client->state_u == 1) ? "Activado" : "Desactivado" }}</td>
        <td class="text-center">
          <a class="btn btn-warning" href="{{ route('detailsClient', $client->id) }}">{{ __('Detalles') }}</a>
          <a class="btn btn-danger" href="{{ route('editClient', $client->id) }}">{{ __('Editar') }}</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<section class="d-flex justify-content-center">
  {{ $clients->links() }}
</section>
@endsection
