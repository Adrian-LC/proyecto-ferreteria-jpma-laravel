@extends('layouts.plantilla')

@section('content')
<h1 class="text-center">Administrar Productos</h1>
<section class="pb-1 d-flex justify-content-between">
  <form class="d-flex align-items-center" action="" method="GET">
    <input class="btn btn-primary" type="submit" value="Buscar"><input type="text" name="search">
  </form>
  <a class="btn btn-success" href="{{ route('addProduct') }}">{{ __('Agregar Producto') }}</a>
</section>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">Nombre</th>
      <th class="text-center" scope="col">Categoría</th>
      <th class="text-center" scope="col">Estado</th>
      <th class="text-center" scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $key => $product)
      <tr>
        <th class="text-center" scope="row">{{ $key+1 }}</th>
        <td class="text-center">{{ $product->name_p }}</td>
        <td class="text-center">{{ $product->product_category->name_pc }}</td>
        <td class="text-center">{{ ($product->state_p == 1) ? "Activado" : "Desactivado" }}</td>
        <td class="text-center">
          <a class="btn btn-warning" href="{{ route('detailsProduct', $product->id) }}">{{ __('Detalles') }}</a>
          <a class="btn btn-danger" href="{{ route('editProduct', $product->id) }}">{{ __('Editar') }}</a>
        </td>
      </tr>
    @endforeach
  </tbody>
  {{ $products->links() }}
</table>
@endsection
