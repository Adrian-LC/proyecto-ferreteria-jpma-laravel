@extends('layouts.plantilla')

@section('content')
<section class="row m-0 justify-content-center py-3 px-2">
  <div class="_borderAnimation card col-12 col-md-7 border-0 pt-2">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <h1 class="card-title text-center m-0">Detalles de la Pregunta Frecuente</h1>
    <div class="card-body">
      <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item"><b>Pregunta: </b>{{ $frequentQuestion->question }}</li>
        <li class="list-group-item"><b>Respuesta: </b>{{ $frequentQuestion->answer }}</li>
      </ul>
      <a class="btn btn-dark" href="{{ route('administrateFrequentQuestions') }}">{{ __('Administrar Preguntas Frecuentes') }}</a>
    </div>
  </div>
</section>
@endsection
