@extends('layouts.plantilla')

@section('content')
<h1 class="text-center">Administrar Preguntas Frecuentes</h1>
<section class="pb-1 d-flex justify-content-between">
  <form class="d-flex align-items-center" action="" method="GET">
    <input class="btn btn-primary" type="submit" value="Buscar"><input type="text" name="search">
  </form>
  <a class="btn btn-success" href="{{ route('addFrequentQuestion') }}">{{ __('Agregar Pregunta Frecuente') }}</a>
</section>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">Pregunta</th>
      <th class="text-center" scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($frequentQuestions as $key => $frequentQuestion)
      <tr>
        <th class="text-center" scope="row">{{ $key+1 }}</th>
        <td class="text-center">{{ $frequentQuestion->question }}</td>
        <td class="text-center">
          <a class="btn btn-warning" href="{{ route('detailsFrequentQuestion', $frequentQuestion->id) }}">{{ __('Detalles') }}</a>
          <a class="btn btn-danger" href="{{ route('editFrequentQuestion', $frequentQuestion->id) }}">{{ __('Editar') }}</a>
          <form class="d-inline" action="{{ route('deleteFrequentQuestion') }}" method="POST">
            {{ method_field('DELETE') }}
            @csrf
            <input type="hidden" name="id" value="{{ $frequentQuestion->id }}">
            <button class="btn btn-secondary" type="submit">{{ __('Eliminar') }}</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
  {{ $frequentQuestions->links() }}
</table>
@endsection
