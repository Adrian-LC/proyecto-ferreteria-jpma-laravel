@extends('layouts.plantilla')

@section('content')
<h1 class="text-center">Administrar Categorías de Productos</h1>
<section class="pb-1 d-flex justify-content-between">
  <form class="d-flex align-items-center" action="" method="GET">
    <input class="btn btn-primary" type="submit" value="Buscar"><input type="text" name="search">
  </form>
  <a class="btn btn-success" href="{{ route('addProductCategory') }}">{{ __('Agregar Categoría') }}</a>
</section>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">Categoría</th>
      <th class="text-center" scope="col">Estado</th>
      <th class="text-center" scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($productCategories as $key => $productCategory)
      <tr>
        <th class="text-center" scope="row">{{ $key+1 }}</th>
        <td class="text-center">{{ $productCategory->name_pc }}</td>
        <td class="text-center">{{ ($productCategory->state_pc == 1) ? "Activado" : "Desactivado" }}</td>
        <td class="text-center"><a class="btn btn-danger" href="{{ route('editProductCategory', $productCategory->id) }}">{{ __('Editar') }}</a></td>
      </tr>
    @endforeach
  </tbody>
  {{ $productCategories->links() }}
</table>
@endsection
