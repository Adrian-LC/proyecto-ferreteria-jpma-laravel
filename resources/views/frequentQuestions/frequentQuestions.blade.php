@extends('layouts.plantilla')

@section('content')
<h1 class="text-center">Preguntas Frecuentes</h1>
<section class="row m-0">
  <section class="accordion col-12 col-md-10 offset-md-1" id="accordionExample">
    @foreach ($frequentQuestions as $key => $frequentQuestion)
      <section class="card">
        <div class="card-header bg-white" id="{{ 'heading'.$key }}">
          <h3 class="mb-0">
            <button class="btn btn-primary btn-block collapsed" type="button" data-toggle="collapse" data-target="{{ '#collapse'.$key }}">
              {{ $frequentQuestion->question }}
            </button>
          </h3>
        </div>
        <div id="{{ 'collapse'.$key }}" class="collapse" data-parent="#accordionExample">
          <div class="card-body">
            <p class="m-0">
              {{ $frequentQuestion->answer }}
            </p>
          </div>
        </div>
      </section>
    @endforeach
  </section>
  <section class="text-center col-12 d-flex justify-content-center mt-4">
    {{ $frequentQuestions->links() }}
  </section>
</section>
@endsection
